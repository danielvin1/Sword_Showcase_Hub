param location string = resourceGroup().location
param environmentName string
param projectName string
param appServicePlanSkuName string = 'B1'
param appServicePlanCapacity int = 1
param mysqlAdminUsername string = 'azureuser'
param mysqlVersion string = '8.0.35'
param phpVersion string = '8.3'
param keyVaultEnablePurgeProtection bool = false
param keyVaultEnableSoftDelete bool = true

// Variables
var resourceToken = uniqueString(resourceGroup().id)
var resourceGroupName = resourceGroup().name
var appServiceName = 'app-${projectName}-${environmentName}'
var appServicePlanName = 'asp-${projectName}-${environmentName}'
var mysqlServerName = 'mysql-${projectName}-${environmentName}-${resourceToken}'
var mysqlDatabaseName = 'sword_showcase'
var storageAccountName = 'st${projectName}${environmentName}${resourceToken}'
var keyVaultName = 'kv-${projectName}-${environmentName}-${resourceToken}'
var appInsightsName = 'ai-${projectName}-${environmentName}'
var managedIdentityName = 'id-${projectName}-${environmentName}'

// Tags for all resources
var tags = {
  environment: environmentName
  project: projectName
  createdDate: utcNow('u')
}

// ============================================
// Managed Identity for App Service
// ============================================
resource managedIdentity 'Microsoft.ManagedIdentity/userAssignedIdentities@2023-01-31' = {
  name: managedIdentityName
  location: location
  tags: tags
}

// ============================================
// Application Insights
// ============================================
resource appInsights 'Microsoft.Insights/components@2020-02-02' = {
  name: appInsightsName
  location: location
  kind: 'web'
  properties: {
    Application_Type: 'web'
    RetentionInDays: 30
    publicNetworkAccessForIngestion: 'Enabled'
    publicNetworkAccessForQuery: 'Enabled'
  }
  tags: tags
}

// ============================================
// Storage Account for Blob Storage
// ============================================
resource storageAccount 'Microsoft.Storage/storageAccounts@2023-01-01' = {
  name: storageAccountName
  location: location
  kind: 'StorageV2'
  sku: {
    name: 'Standard_LRS'
  }
  properties: {
    accessTier: 'Hot'
    minimumTlsVersion: 'TLS1_2'
    supportsHttpsTrafficOnly: true
    allowBlobPublicAccess: false
  }
  tags: tags
}

// Blob Service
resource blobService 'Microsoft.Storage/storageAccounts/blobServices@2023-01-01' = {
  parent: storageAccount
  name: 'default'
}

// Containers for different types of uploads
resource uploadsContainer 'Microsoft.Storage/storageAccounts/blobServices/containers@2023-01-01' = {
  parent: blobService
  name: 'uploads'
  properties: {
    publicAccess: 'None'
  }
}

resource profilePhotosContainer 'Microsoft.Storage/storageAccounts/blobServices/containers@2023-01-01' = {
  parent: blobService
  name: 'profile-photos'
  properties: {
    publicAccess: 'None'
  }
}

resource swordPhotosContainer 'Microsoft.Storage/storageAccounts/blobServices/containers@2023-01-01' = {
  parent: blobService
  name: 'sword-photos'
  properties: {
    publicAccess: 'None'
  }
}

// ============================================
// Key Vault for Secrets Management
// ============================================
resource keyVault 'Microsoft.KeyVault/vaults@2023-07-01' = {
  name: keyVaultName
  location: location
  properties: {
    tenantId: subscription().tenantId
    sku: {
      family: 'A'
      name: 'standard'
    }
    accessPolicies: [
      {
        tenantId: subscription().tenantId
        objectId: managedIdentity.properties.principalId
        permissions: {
          secrets: ['get', 'list']
          certificates: ['get', 'list']
        }
      }
    ]
    enableSoftDelete: keyVaultEnableSoftDelete
    softDeleteRetentionInDays: 7
    enablePurgeProtection: keyVaultEnablePurgeProtection
    enabledForDeployment: true
    networkAcls: {
      bypass: 'AzureServices'
      defaultAction: 'Allow'
    }
  }
  tags: tags
}

// ============================================
// MySQL Flexible Server
// ============================================
resource mysqlServer 'Microsoft.DBforMySQL/flexibleServers@2023-06-01-preview' = {
  name: mysqlServerName
  location: location
  sku: {
    name: 'Standard_B1ms'
    tier: 'Burstable'
  }
  properties: {
    version: mysqlVersion
    administratorLogin: mysqlAdminUsername
    administratorLoginPassword: generatePasswordSecurely()
    storage: {
      storageSizeGB: 20
    }
    backup: {
      backupRetentionDays: 7
      geoRedundantBackup: 'Disabled'
    }
    network: {
      delegatedSubnetResourceId: null
      privateDnsZoneResourceId: null
    }
    highAvailability: {
      mode: 'Disabled'
    }
    maintenanceWindow: {
      customWindow: 'Disabled'
      dayOfWeek: 0
      startHour: 0
      startMinute: 0
    }
  }
  tags: tags
}

// MySQL Database
resource mysqlDatabase 'Microsoft.DBforMySQL/flexibleServers/databases@2023-06-01-preview' = {
  parent: mysqlServer
  name: mysqlDatabaseName
  properties: {
    charset: 'utf8mb4'
    collation: 'utf8mb4_unicode_ci'
  }
}

// MySQL Firewall Rule - Allow Azure Services
resource mysqlFirewallRule 'Microsoft.DBforMySQL/flexibleServers/firewallRules@2023-06-01-preview' = {
  parent: mysqlServer
  name: 'AllowAzureServices'
  properties: {
    startIpAddress: '0.0.0.0'
    endIpAddress: '0.0.0.0'
  }
}

// ============================================
// App Service Plan
// ============================================
resource appServicePlan 'Microsoft.Web/serverfarms@2023-01-01' = {
  name: appServicePlanName
  location: location
  kind: 'Linux'
  sku: {
    name: appServicePlanSkuName
    capacity: appServicePlanCapacity
  }
  properties: {
    reserved: true
  }
  tags: tags
}

// ============================================
// App Service (Web App)
// ============================================
resource appService 'Microsoft.Web/sites@2023-01-01' = {
  name: appServiceName
  location: location
  identity: {
    type: 'UserAssigned'
    userAssignedIdentities: {
      '${managedIdentity.id}': {}
    }
  }
  properties: {
    serverFarmId: appServicePlan.id
    httpsOnly: true
    siteConfig: {
      linuxFxVersion: 'PHP|${phpVersion}'
      alwaysOn: true
      minTlsVersion: '1.2'
      http20Enabled: true
      remoteDebuggingEnabled: false
      appSettings: [
        {
          name: 'WEBSITES_ENABLE_APP_SERVICE_STORAGE'
          value: 'false'
        }
        {
          name: 'APPLICATIONINSIGHTS_CONNECTION_STRING'
          value: appInsights.properties.ConnectionString
        }
        {
          name: 'ApplicationInsightsAgent_EXTENSION_VERSION'
          value: '~3'
        }
        {
          name: 'XDT_MicrosoftApplicationInsights_Mode'
          value: 'recommended'
        }
      ]
      connectionStrings: []
      defaultDocuments: ['index.php', 'hostingstart.html']
      phpVersion: phpVersion
      numberOfWorkers: 1
      defaultAction: 'Allow'
    }
  }
  tags: tags
}

// App Service Logging Configuration
resource appServiceWebLogs 'Microsoft.Web/sites/config@2023-01-01' = {
  parent: appService
  name: 'logs'
  properties: {
    applicationLogs: {
      fileSystem: {
        level: 'Warning'
      }
    }
    httpLogs: {
      fileSystem: {
        retentionInDays: 7
        enabled: true
      }
    }
    failedRequestsTracing: {
      enabled: true
    }
    detailedErrorMessages: {
      enabled: true
    }
  }
}

// App Service Configuration
resource appServiceConfig 'Microsoft.Web/sites/config@2023-01-01' = {
  parent: appService
  name: 'web'
  properties: {
    numberOfWorkers: 1
    defaultDocuments: [
      'index.php'
      'hostingstart.html'
    ]
    netFrameworkVersion: 'v4.0'
    phpVersion: phpVersion
    requestTracingEnabled: false
    remoteDebuggingEnabled: false
    httpLoggingEnabled: true
    detailedErrorLoggingEnabled: true
    publishingUsername: appServiceName
    scmType: 'None'
    use32BitWorkerProcess: false
    webSocketsEnabled: false
    managedPipelineMode: 'Integrated'
    virtualApplications: [
      {
        virtualPath: '/'
        physicalPath: 'site\\wwwroot\\public'
        preloadEnabled: true
      }
    ]
    localMySqlEnabled: false
    ipSecurityRestrictions: [
      {
        ipAddress: 'Any'
        action: 'Allow'
        priority: 1
        name: 'Allow all'
        description: 'Allow all access'
      }
    ]
    scmIpSecurityRestrictions: [
      {
        ipAddress: 'Any'
        action: 'Allow'
        priority: 1
        name: 'Allow all'
        description: 'Allow all access'
      }
    ]
    scmIpSecurityRestrictionsUseMain: false
    http20Enabled: true
    minTlsVersion: '1.2'
    minTlsCipherSuite: 'TLS_ECDHE_RSA_WITH_AES_256_GCM_SHA384'
    scmMinTlsVersion: '1.0'
    ftpsState: 'Disabled'
    preWarmedInstanceCount: 0
    functionAppScaleLimit: 0
    fileChangeAuditEnabled: false
    functionsRuntimeScaleMonitoringEnabled: false
    websiteTimeZone: 'UTC'
    minimumElasticInstanceCount: 0
    azureStorageAccounts: {}
  }
}

// ============================================
// RBAC Role Assignments
// ============================================

// Storage Blob Data Contributor role for Managed Identity
resource storageBlobRoleAssignment 'Microsoft.Authorization/roleAssignments@2022-04-01' = {
  scope: storageAccount
  name: guid(storageAccount.id, managedIdentity.id, 'ba92f5b4-2d11-453d-a403-e96b0029c9fe')
  properties: {
    roleDefinitionId: subscriptionResourceId('Microsoft.Authorization/roleDefinitions', 'ba92f5b4-2d11-453d-a403-e96b0029c9fe') // Storage Blob Data Contributor
    principalId: managedIdentity.properties.principalId
    principalType: 'ServicePrincipal'
  }
}

// ============================================
// Outputs
// ============================================
output appServiceName string = appService.name
output appServiceUrl string = 'https://${appService.properties.defaultHostName}'
output mysqlServerName string = mysqlServer.name
output mysqlServerFqdn string = mysqlServer.properties.fullyQualifiedDomainName
output mysqlDatabaseName string = mysqlDatabase.name
output storageAccountName string = storageAccount.name
output storageAccountKey string = storageAccount.listKeys().keys[0].value
output keyVaultName string = keyVault.name
output appInsightsInstrumentationKey string = appInsights.properties.InstrumentationKey
output appInsightsConnectionString string = appInsights.properties.ConnectionString
output managedIdentityId string = managedIdentity.id
output managedIdentityClientId string = managedIdentity.properties.clientId
output managedIdentityPrincipalId string = managedIdentity.properties.principalId

// Helper function to generate a secure password
// Note: In production, use a Key Vault secret for the MySQL admin password
func generatePasswordSecurely() string => base64(uniqueString(resourceGroup().id, deployment().name))
