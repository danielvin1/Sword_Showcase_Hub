# Post-Deployment Configuration Guide

## 1. After Infrastructure Deployment (`azd up`)

### Capture Deployment Outputs
After `azd up` completes, Bicep will output these values. Save them:

```
appServiceName: app-sword-showcase-prod
appServiceUrl: https://app-sword-showcase-prod.azurewebsites.net
mysqlServerName: mysql-sword-showcase-prod-xxxxx
mysqlServerFqdn: mysql-sword-showcase-prod-xxxxx.mysql.database.azure.com
mysqlDatabaseName: sword_showcase
storageAccountName: stswordshowcaseprodxxxxx
storageAccountKey: <long-key>
keyVaultName: kv-sword-showcase-prod-xxxxx
appInsightsInstrumentationKey: <key>
appInsightsConnectionString: InstrumentationKey=...
managedIdentityClientId: <guid>
```

## 2. Configure Application Secrets

### 2.1 Get MySQL Admin Password
During infrastructure deployment, Bicep generates a password. Retrieve it:

```bash
# Option 1: Check Bicep deployment outputs
az deployment group show \
  --name <deployment-name> \
  --resource-group <rg> \
  --query "properties.outputs"

# Option 2: View in Azure Portal
# Portal → Resource Group → Deployments → Select deployment → Outputs
```

### 2.2 Store MySQL Password in Key Vault
```bash
az keyvault secret set \
  --vault-name kv-sword-showcase-prod-xxxxx \
  --name mysql-password \
  --value "<mysql-admin-password>"
```

### 2.3 Store Other Secrets in Key Vault
```bash
# PayPal Credentials
az keyvault secret set --vault-name <kv-name> --name paypal-client-id --value "<prod-client-id>"

# Google OAuth Credentials
az keyvault secret set --vault-name <kv-name> --name google-client-id --value "<prod-client-id>"
az keyvault secret set --vault-name <kv-name> --name google-client-secret --value "<prod-secret>"

# APP_KEY
az keyvault secret set --vault-name <kv-name> --name app-key --value "base64:$(php -r 'echo base64_encode(random_bytes(32));')"
```

## 3. Configure Application

### 3.1 Update Production Environment File
Use the template `.env.production` and populate with captured values:

```env
APP_URL=https://app-sword-showcase-prod.azurewebsites.net
DB_HOST=mysql-sword-showcase-prod-xxxxx.mysql.database.azure.com
DB_PASSWORD=<from-key-vault>
AZURE_STORAGE_ACCOUNT=stswordshowcaseprodxxxxx
AZURE_STORAGE_ACCOUNT_KEY=<from-outputs>
PAYPAL_CLIENT_ID=<production-credentials>
GOOGLE_CLIENT_ID=<production-credentials>
GOOGLE_CLIENT_SECRET=<production-credentials>
APPINSIGHTS_INSTRUMENTATIONKEY=<from-outputs>
```

### 3.2 Deploy Environment to App Service
```bash
# Option 1: Upload via Kudu (Azure's built-in deployment service)
# Portal → App Service → Advanced Tools → Go → CMD
# Upload .env.production to wwwroot/

# Option 2: Use Azure CLI
az webapp config appsettings set \
  --resource-group <rg> \
  --name app-sword-showcase-prod \
  --settings \
    DB_HOST="mysql-fqdn" \
    DB_PASSWORD="<password>" \
    AZURE_STORAGE_ACCOUNT="<account>" \
    AZURE_STORAGE_ACCOUNT_KEY="<key>"
```

## 4. Test Database Connectivity

### 4.1 From Local Machine
```bash
# Install MySQL client (if not already installed)
# macOS: brew install mysql-client
# Windows: https://dev.mysql.com/downloads/shell/
# Linux: sudo apt-get install mysql-client

# Connect to Azure MySQL
mysql -h mysql-sword-showcase-prod-xxxxx.mysql.database.azure.com \
      -u azureuser \
      -p sword_showcase

# If successful, you'll see: mysql>
# Type: exit
```

### 4.2 From App Service (via SSH)
```bash
# Enable SSH on App Service (if not already enabled)
az webapp create-remote-connection --resource-group <rg> --name app-sword-showcase-prod

# Then test MySQL from the SSH session
mysql -h localhost -u azureuser -p -e "SELECT 1;"
```

## 5. Run Database Migrations

### 5.1 Via Kudu Console
```
Portal → App Service → Development Tools → SSH (or Web Shell)
cd wwwroot
php artisan migrate --force
```

### 5.2 Via Local Deployment
```bash
# If using GitHub Actions or similar CI/CD
# Add to deployment workflow:
php artisan migrate --force --env=production
```

### 5.3 Verify Migrations
```bash
mysql -h <mysql-fqdn> -u azureuser -p sword_showcase
SELECT * FROM migrations;
```

## 6. Configure Blade Storage (Blob Storage)

### 6.1 Update Laravel Filesystem Config
Edit `config/filesystems.php`:

```php
'disks' => [
    // ... existing disks ...
    
    'azure' => [
        'driver' => 'azure',
        'account' => env('AZURE_STORAGE_ACCOUNT'),
        'key' => env('AZURE_STORAGE_ACCOUNT_KEY'),
        'container' => env('AZURE_STORAGE_CONTAINER', 'uploads'),
        'url' => env('AZURE_URL'),
        'visibility' => 'private',
    ],
],

// Set default disk for file uploads
'default' => env('FILESYSTEM_DISK', 'azure'),
```

### 6.2 Update Model Storage References
For User profile photos:
```php
// app/Models/User.php
public function getProfilePhotoUrlAttribute()
{
    return Storage::disk('azure')
        ->url($this->profile_photo_path);
}
```

### 6.3 Configure Blob Containers
The Bicep template creates these containers:
- `uploads` - General file uploads
- `profile-photos` - User profile photos
- `sword-photos` - Sword/product images

Ensure your application code uses the correct container names.

## 7. Update Google OAuth

### 7.1 Configure Redirect URIs in Google Cloud Console
1. Go to Google Cloud Console → OAuth 2.0 Credentials
2. Edit the Authorized Redirect URIs:
   - Add: `https://app-sword-showcase-prod.azurewebsites.net/auth/callback/google`
   - Add: `https://app-sword-showcase-prod.azurewebsites.net/login/google/callback`

### 7.2 Update Environment Variables
```bash
GOOGLE_CLIENT_ID=<production-client-id>
GOOGLE_CLIENT_SECRET=<production-secret>
```

## 8. Update PayPal Configuration

### 8.1 Switch to Production Credentials
Replace sandbox credentials:
```bash
PAYPAL_CLIENT_ID=<production-client-id>
PAYPAL_CURRENCY=EUR
```

### 8.2 Test PayPal Integration
1. Go to your app: `https://app-sword-showcase-prod.azurewebsites.net`
2. Initiate a test purchase/order
3. Verify PayPal redirect works
4. Check PayPal dashboard for webhook events

### 8.3 Configure PayPal Webhooks (if used)
```
PayPal Dashboard → Apps & Credentials → Webhooks
Event URL: https://app-sword-showcase-prod.azurewebsites.net/api/paypal/webhook
```

## 9. Configure Application Monitoring

### 9.1 Verify Application Insights
```bash
# Check if monitoring is active
az monitor app-insights component show \
  --app ai-sword-showcase-prod \
  --resource-group <rg>
```

### 9.2 View Logs in Portal
- Portal → Application Insights → Search
- Portal → Application Insights → Performance
- Portal → Application Insights → Failures

### 9.3 Configure Alerts (Optional)
```bash
# Alert on HTTP 500+ errors
# Portal → Application Insights → Alerts → New Alert Rule
```

## 10. Enable HTTPS and SSL

### 10.1 Verify SSL
```bash
# Should redirect to HTTPS automatically
curl -I https://app-sword-showcase-prod.azurewebsites.net
# Check for: 301/302 Moved Permanently (HTTP → HTTPS redirect)
```

### 10.2 Configure HTTPS Redirect in Laravel
Add to `app/Http/Middleware/TrustProxies.php` or use app settings:

```bash
az webapp config set \
  --resource-group <rg> \
  --name app-sword-showcase-prod \
  --https-only true
```

## 11. Setup Custom Domain (Optional)

### 11.1 Add Custom Domain
```bash
az webapp config hostname add \
  --resource-group <rg> \
  --webapp-name app-sword-showcase-prod \
  --hostname yourdomain.com
```

### 11.2 Bind SSL Certificate
- Portal → App Service → TLS/SSL Settings → Private Key Certificates
- Upload or use Azure Managed Certificate

## 12. Enable Continuous Deployment (Optional)

### 12.1 Setup GitHub Actions
Create `.github/workflows/deploy.yml`:
```yaml
name: Deploy to Azure

on:
  push:
    branches: [main]

jobs:
  deploy:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v3
      - name: Deploy to App Service
        uses: azure/webapps-deploy@v2
        with:
          app-name: app-sword-showcase-prod
          publish-profile: ${{ secrets.AZURE_PUBLISH_PROFILE }}
          package: .
```

## 13. Monitoring & Maintenance

### 13.1 Check App Service Health
```bash
az webapp show --resource-group <rg> --name app-sword-showcase-prod \
  --query "{state:state, hostNames:hostNames}"
```

### 13.2 View App Logs
```bash
az webapp log tail --resource-group <rg> --name app-sword-showcase-prod
```

### 13.3 Monitor Costs
- Portal → Cost Management + Billing → Cost Analysis
- Set Budget Alerts for student account limits

### 13.4 Regular Backups
```bash
# Enable automatic backups
az webapp config backup create \
  --resource-group <rg> \
  --name app-sword-showcase-prod
```

## 14. Troubleshooting

### App Service Not Starting
```bash
# Check deployment logs
az webapp deployment log show --resource-group <rg> --name app-sword-showcase-prod

# Check application logs
az webapp log tail --resource-group <rg> --name app-sword-showcase-prod
```

### Database Connection Error
```bash
# Verify MySQL firewall rule
az mysql flexible-server firewall-rule list \
  --resource-group <rg> \
  --name mysql-sword-showcase-prod-xxxxx

# Add App Service IP if needed
az mysql flexible-server firewall-rule create \
  --resource-group <rg> \
  --name mysql-sword-showcase-prod-xxxxx \
  --rule-name AllowAppService \
  --start-ip-address <app-service-ip> \
  --end-ip-address <app-service-ip>
```

### Storage Account Access Denied
```bash
# Verify managed identity has correct role
az role assignment list \
  --resource-group <rg> \
  --scope /subscriptions/<subscription>/resourceGroups/<rg>/providers/Microsoft.Storage/storageAccounts/<storage-name>
```

## Next Steps

1. ✅ Run through pre-deployment checklist
2. ✅ Execute `azd up` to provision infrastructure
3. ✅ Follow this post-deployment guide
4. ✅ Test all features in production
5. ✅ Monitor costs and performance
6. ✅ Set up continuous deployment (optional)
