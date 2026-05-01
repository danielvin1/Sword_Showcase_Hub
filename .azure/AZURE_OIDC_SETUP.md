Azure OIDC Setup Guide

This guide explains how to create an Azure AD App Registration for GitHub Actions OIDC login, add a federated credential, assign a role on the subscription, and configure your GitHub repository.

Prerequisites
- `az` CLI installed and authenticated
- `jq` installed for JSON parsing
- Permissions to create App Registrations and role assignments (Global Admin or Privileged role)

1) Create App Registration + Service Principal (recommended via script)
- Run the script: `bash scripts/azure/create_github_oidc_app.sh`
- Provide your subscription id (e.g., `39070c46-b6fe-48c5-8292-d9cee376b709`), a display name, and the GitHub subject (e.g., `xRich07/Sword_Showcase_Hub`) and branch ref (e.g., `refs/heads/main`).
- Script outputs three values to add to GitHub repo secrets: `AZURE_CLIENT_ID`, `AZURE_TENANT_ID`, `AZURE_SUBSCRIPTION_ID`.

2) Add GitHub repository secrets
- Go to repository → Settings → Secrets and variables → Actions → New repository secret
- Add: `AZURE_CLIENT_ID`, `AZURE_TENANT_ID`, `AZURE_SUBSCRIPTION_ID` with values printed by the script

3) Verify GitHub Actions workflow
- A workflow `/.github/workflows/azure-oidc-login.yml` has been added to this repo to test OIDC login.
- The workflow requires the repository secrets above. It will call `azure/login@v1` with `auth-type: oidc`.

4) Troubleshooting
- Error: "No subscriptions found for ***": Ensure the Service Principal has a role assignment on the subscription and that `AZURE_SUBSCRIPTION_ID` is the correct subscription id.
- Error creating federated credential: You may need Microsoft Graph permissions; if the script fails, use the Azure Portal (Entra ID → App registrations → your app → Federated credentials → Add credential).

5) Security notes
- Prefer OIDC over client secrets. Only grant least privilege role (e.g., Contributor or a narrower role if possible).
- Limit federated credential subject to the specific repo and branch instead of a wildcard.

6) After setup
- Run the GitHub Actions workflow `Azure OIDC Login Test` (push or manual dispatch) and verify `az account show` returns the subscription details.

Contact your Azure admin if you lack permissions to create app registrations or role assignments.
