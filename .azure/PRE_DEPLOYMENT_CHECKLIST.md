# Pre-Deployment Checklist

## Prerequisites
- [ ] Azure CLI installed and authenticated
- [ ] Azure Developer CLI (azd) installed: `winget install microsoft.azd`
- [ ] PHP 8.3 and Composer installed locally
- [ ] Node.js and npm installed

## Azure Setup
- [ ] Azure Student Account with active subscription
- [ ] Subscription ID: `39070c46-b6fe-48c5-8292-d9cee376b709`
- [ ] Region set to: `westeurope` (Spain)
- [ ] Resource quota verified for:
  - [ ] App Service (B1 tier minimum)
  - [ ] MySQL Flexible Server (Standard_B1ms minimum)
  - [ ] Storage Account (LRS minimum)
  - [ ] Key Vault

## Application Secrets & Credentials
- [ ] PayPal Production Credentials
  - [ ] PAYPAL_CLIENT_ID (production, not sandbox)
  - [ ] PAYPAL_CURRENCY set to EUR
- [ ] Google OAuth Production Credentials
  - [ ] GOOGLE_CLIENT_ID (production)
  - [ ] GOOGLE_CLIENT_SECRET (production)
  - [ ] Update OAuth redirect URIs to point to Azure App Service URL
- [ ] Generate new APP_KEY for production (already done: `php artisan key:generate`)

## Environment Configuration
- [ ] Update `.env.production` with:
  - [ ] `APP_URL` - Will be provided by Bicep deployment outputs
  - [ ] Database credentials - Will be created during infrastructure deployment
  - [ ] PayPal credentials - Update before deployment
  - [ ] Google OAuth credentials - Update before deployment
  - [ ] Azure Storage credentials - Will be output by Bicep template
  - [ ] Application Insights key - Will be provided by Bicep

## Infrastructure Files
- [ ] Verify `azure.yaml` exists
- [ ] Verify `infra/main.bicep` exists
- [ ] Verify `infra/main.parameters.json` exists
- [ ] Verify `Dockerfile` exists
- [ ] Verify `.dockerignore` exists

## Database Preparation
- [ ] Laravel migrations are up-to-date
- [ ] Seeders configured if needed (DatabaseSeeder.php)
- [ ] Review migration files in `database/migrations/`

## Storage Configuration
- [ ] Update Laravel filesystem config for Blob Storage
- [ ] Configure storage disk in `config/filesystems.php`:
  ```php
  'disks' => [
      'azure' => [
          'driver' => 'azure',
          'account' => env('AZURE_STORAGE_ACCOUNT'),
          'key' => env('AZURE_STORAGE_ACCOUNT_KEY'),
          'container' => env('AZURE_STORAGE_CONTAINER', 'uploads'),
          'url' => env('AZURE_URL'),
          'visibility' => 'private',
      ],
  ]
  ```

## Security Review
- [ ] SSL/TLS enabled in Bicep template ✓
- [ ] Key Vault enabled for secrets management ✓
- [ ] Managed Identity configured ✓
- [ ] RBAC role assignments in place ✓
- [ ] MySQL firewall rules configured ✓
- [ ] Storage account: HTTPS-only ✓
- [ ] Storage account: No public blob access ✓

## Post-Deployment Steps (Execute After Infrastructure)
1. [ ] Run: `azd up` to provision infrastructure
2. [ ] Capture Bicep outputs:
   - [ ] App Service URL
   - [ ] MySQL Server FQDN
   - [ ] Storage Account Key
   - [ ] Key Vault Name
3. [ ] Connect to MySQL and verify database:
   ```bash
   mysql -h <mysql-fqdn> -u azureuser -p
   ```
4. [ ] Update `.env.production` with captured values
5. [ ] Deploy application: `azd deploy`
6. [ ] Run migrations on Azure:
   ```bash
   php artisan migrate --force --env=production
   ```
7. [ ] Run seeders if needed:
   ```bash
   php artisan db:seed --env=production
   ```
8. [ ] Verify Application Insights monitoring
9. [ ] Test PayPal integration in production
10. [ ] Test Google OAuth with production credentials
11. [ ] Test file uploads to Blob Storage

## Troubleshooting
- If MySQL connection fails: Check firewall rules and IP allowlist
- If App Service deployment fails: Check Application Insights logs
- If Blob Storage access fails: Verify managed identity permissions
- If migrations fail: Check database connectivity and credentials

## Cost Estimation
**Note**: This is a student account. Monitor costs to stay within free/trial limits.
- App Service B1: ~€10-15/month
- MySQL Flexible Server B1ms: ~€8-10/month
- Storage Account: ~€0.50/month (minimal usage)
- Key Vault: ~€0.50/month
- **Estimated Total**: ~€20-30/month (may be covered by student credits)

Monitor via Azure Portal → Cost Management + Billing

## Useful Azure CLI Commands
```bash
# List resource groups
az group list --output table

# Get App Service logs
az webapp log tail --resource-group <rg> --name <app-name>

# Get MySQL connection details
az mysql flexible-server show --resource-group <rg> --name <mysql-name>

# Get Storage Account key
az storage account keys list --resource-group <rg> --account-name <storage-name>

# Access Key Vault secrets
az keyvault secret list --vault-name <kv-name>
```

## Documentation References
- [Azure App Service PHP Configuration](https://docs.microsoft.com/en-us/azure/app-service/configure-language-php)
- [Azure MySQL Flexible Server](https://docs.microsoft.com/en-us/azure/mysql/flexible-server/)
- [Azure Blob Storage Laravel Driver](https://laravel.com/docs/11.x/filesystem#azure)
- [Azure Developer CLI Documentation](https://learn.microsoft.com/en-us/azure/developer/azure-developer-cli/)
