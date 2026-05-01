#!/usr/bin/env bash
set -euo pipefail

# Script: create_github_oidc_app.sh
# Purpose: Create an Azure AD App Registration, Service Principal, add a GitHub Actions OIDC federated credential,
# and assign a role on the subscription so GitHub Actions can authenticate via OIDC.
# Run locally as a user with permission to create app registrations and role assignments.

if ! command -v az >/dev/null 2>&1; then
  echo "az CLI not found. Install from https://learn.microsoft.com/cli/azure/install-azure-cli"
  exit 1
fi

if ! command -v jq >/dev/null 2>&1; then
  echo "jq not found. Install jq to parse JSON (apt install jq / brew install jq)"
  exit 1
fi

read -p "Azure subscription id: " SUBSCRIPTION_ID
read -p "Display name for App Registration (example: github-actions-sword-showcase): " APP_NAME
read -p "GitHub repo subject (exact): " GITHUB_SUBJECT
read -p "GitHub workflow branch/ref (e.g., refs/heads/main): " GITHUB_REF

az account set --subscription "$SUBSCRIPTION_ID"

echo "Creating Azure AD app registration..."
APP_JSON=$(az ad app create --display-name "$APP_NAME" --sign-in-audience AzureADMyOrg)
APP_ID=$(echo "$APP_JSON" | jq -r .appId)
APP_OBJECT_ID=$(echo "$APP_JSON" | jq -r .id)

echo "App created: appId=$APP_ID, objectId=$APP_OBJECT_ID"

echo "Creating Service Principal for the app (if not exists)..."
SP_JSON=$(az ad sp create --id "$APP_ID" || az ad sp show --id "$APP_ID")
SP_OBJECT_ID=$(echo "$SP_JSON" | jq -r .objectId // .id)
SP_APP_ID=$(echo "$SP_JSON" | jq -r .appId // .appId)

echo "Service principal: objectId=$SP_OBJECT_ID, appId=$SP_APP_ID"

# Create federated credential via Microsoft Graph (az rest)
# Build subject like: repo:ORG/REPO:ref:refs/heads/main
SUBJECT="repo:${GITHUB_SUBJECT}:${GITHUB_REF}"

FED_NAME="github-actions-${APP_NAME}-cred"

echo "Adding federated credential to the app (subject=$SUBJECT)..."
FED_PAYLOAD=$(jq -n --arg n "$FED_NAME" --arg issuer "https://token.actions.githubusercontent.com" --arg subj "$SUBJECT" --argjson aud '["api://AzureADTokenExchange"]' '{name: $n, issuer: $issuer, subject: $subj, audiences: $aud}')

az rest --method POST --uri "https://graph.microsoft.com/v1.0/applications/$APP_OBJECT_ID/federatedIdentityCredentials" --headers "Content-Type=application/json" --body "$FED_PAYLOAD"

echo "Federated credential created."

# Assign role to the service principal on subscription
ROLE="Contributor"
SCOPE="/subscriptions/$SUBSCRIPTION_ID"

echo "Assigning role '$ROLE' to service principal on subscription..."
az role assignment create --assignee-object-id "$SP_OBJECT_ID" --assignee-principal-type ServicePrincipal --role "$ROLE" --scope "$SCOPE"

echo "Role assignment created."

echo "Output values you should add to your GitHub repository secrets:"
echo "AZURE_CLIENT_ID=$APP_ID"
echo "AZURE_TENANT_ID=$(az account show --query tenantId -o tsv)"
echo "AZURE_SUBSCRIPTION_ID=$SUBSCRIPTION_ID"

echo "Done. Now add those three values to your GitHub repository secrets and run the workflow 'Azure OIDC Login Test'."

# Helpful note
cat <<'EOF'
NOTE:
- The federated credential subject must exactly match the subject GitHub emits. For branch runs it's usually:
  repo:<owner>/<repo>:ref:refs/heads/<branch>
- To allow all branches you can use a subject like `repo:<owner>/<repo>:ref:refs/heads/*` but add only if you understand the security implications.
- This script requires permissions to create app registrations and role assignments (often Global Admin or Privileged roles). If you don't have them, use the Azure Portal or ask an admin.
EOF
