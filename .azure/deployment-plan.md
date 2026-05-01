# Sword Showcase Hub — Azure Deployment Plan

## Phase 1: Planning ✅ (FINAL)

### Step 1: Analyze Workspace
- **Mode**: MODIFY (existing Laravel project → Azure)
- **Application Type**: Laravel 11 web application (PHP)
- **Key Features**: User authentication (Google OAuth), sword showcase, likes/follows, discussions, PayPal orders

### Step 2: Analyze Current State
- **Current DB**: SQLite (local)
- **Current Storage**: Local file uploads
- **Authentication**: Google OAuth 2.0 (configured)
- **Payment**: PayPal integration (configured)
- **Framework**: Laravel 11 with Blade templating

### Step 3: Select Target Environment
- **Subscription**: `39070c46-b6fe-48c5-8292-d9cee376b709` (student account)
- **Region**: `westeurope` (Spain)
- **Hosting Service**: Azure App Service (Linux PHP 8.3)
- **Database**: Azure Database for MySQL Flexible Server
- **Storage**: Azure Blob Storage (for profile photos, banner photos, sword images)
- **Observability**: Application Insights (logging, monitoring)

### Step 4: Select Recipe
- **Recipe**: Laravel App Service + MySQL + Blob Storage
- **IaC Format**: Bicep
- **CI/CD**: Optional (azd can handle deployment)

### Step 5: Plan Resource Naming & Configuration
- **Resource Group**: `rg-sword-showcase-<env>` (e.g., `rg-sword-showcase-prod`)
- **App Service**: `app-sword-showcase-<env>`
- **MySQL Server**: `mysql-sword-showcase-<env>`
- **Storage Account**: `stswordshowcase<env>` (storage account naming: lowercase, no hyphens)
- **Key Vault**: `kv-sword-showcase-<env>` (for secrets management)
- **Application Insights**: `ai-sword-showcase-<env>`

### Step 6: Generate Deployment Artifacts (Phase 2 Output)
Phase 2 will generate:
- [ ] `.azure/` configuration files
- [ ] Bicep IaC templates (`infra/` directory)
- [ ] Updated `.env` template for production
- [ ] Deployment validation checklist

---

## Phase 2: Code Generation ✅ (COMPLETE)

### Step 1: Generate Bicep Infrastructure ✅
- [x] Resource Group + Tags
- [x] MySQL Flexible Server + database
- [x] App Service Plan + App Service (PHP 8.3, Linux)
- [x] Storage Account + containers (uploads, profile-photos, sword-photos)
- [x] Key Vault + secrets management
- [x] Application Insights
- [x] Managed Identity for App Service
- [x] RBAC role assignments (Storage Blob Data Contributor)

### Step 2: Generate Configuration Files ✅
- [x] `azure.yaml` (azd project config)
- [x] `infra/main.bicep` (primary template with 20+ resources)
- [x] `infra/main.parameters.json` (parameter defaults)
- [x] `.env.production` template with Azure/Key Vault references
- [x] `Dockerfile` (production-ready PHP 8.3 Alpine)
- [x] `.dockerignore` (optimized build context)

### Step 3: Application Code Updates (PENDING)
- [ ] Configure `config/filesystems.php` for Azure Blob Storage disk
- [ ] Update model classes to use `Storage::disk('azure')`
- [ ] Optional: Add Key Vault integration for advanced secret management

### Step 4: Generate Deployment Documentation ✅
- [x] `.azure/PRE_DEPLOYMENT_CHECKLIST.md` (14-point checklist)
- [x] `.azure/POST_DEPLOYMENT_GUIDE.md` (step-by-step setup guide)
- [x] `.azure/deployment-plan.md` (this document)

---

## Phase 3: Validation & Deployment (PENDING)

### Validation (via `azure-validate` skill)
- [ ] Bicep template validation
- [ ] Parameter compatibility check
- [ ] Azure quota availability (vCPU, storage, etc.)

### Deployment (via `azure-deploy` skill)
- [ ] Run `azd up` to provision infrastructure
- [ ] Verify database connectivity
- [ ] Run Laravel migrations: `php artisan migrate --force`
- [ ] Configure app secrets in Key Vault
- [ ] Test PayPal & Google OAuth in production

---

## Key Changes Required for Production

### `.env` Changes
1. `APP_ENV=production`, `APP_DEBUG=false`
2. `APP_URL=https://<app-service-url>.azurewebsites.net`
3. `DB_CONNECTION=mysql` (from sqlite)
4. `DB_HOST=<mysql-server>.mysql.database.azure.com`
5. `DB_USERNAME=<admin-username>`
6. `DB_PASSWORD=<stored-in-key-vault>`
7. `FILESYSTEM_DISK=azure` (new disk for Blob Storage)
8. `AZURE_STORAGE_ACCOUNT_KEY=<key-vault-ref>`
9. Update Google OAuth & PayPal to production credentials (if needed)

### Security
- [ ] Create Managed Identity for App Service
- [ ] Store secrets in Key Vault (DB password, API keys)
- [ ] Enable SSL/TLS on App Service
- [ ] Configure firewall rules on MySQL
- [ ] Enable Application Insights monitoring

---

## Deployment Commands (Phase 3)

```bash
# Install azd if not present
# Validate Bicep templates
azd validate

# Provision infrastructure on Azure
azd up

# Deploy application
azd deploy
```

---

## Status Summary
- ✅ Phase 1: Planning COMPLETE
- ✅ Phase 2: Code Generation COMPLETE
- ⏳ Phase 3: Validation & Deployment (ready to begin)

## Files Generated
**Configuration:**
- `azure.yaml` — Azure Developer CLI project config

**Infrastructure (Bicep):**
- `infra/main.bicep` — Primary IaC template (20+ resources)
- `infra/main.parameters.json` — Parameter defaults

**Application:**
- `Dockerfile` — Production-ready PHP 8.3 Alpine container
- `.dockerignore` — Build context optimization
- `.env.production` — Production environment template

**Documentation:**
- `.azure/deployment-plan.md` — This plan (all phases)
- `.azure/PRE_DEPLOYMENT_CHECKLIST.md` — 14-step pre-deployment verification
- `.azure/POST_DEPLOYMENT_GUIDE.md` — Step-by-step post-deployment setup
