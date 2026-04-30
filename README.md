# Sword Showcase Hub

Laravel web application for uploading, browsing, and discussing swords.

## Overview

Sword Showcase Hub is a sword-focused community app where users can register, sign in, upload swords, browse the feed, join discussions, and manage their profile.

## Tech Stack

- Laravel 12
- PHP 8.2+
- Blade templates
- MySQL / SQLite
- Laravel Socialite for Google login
- Bootstrap on the login and register pages

## Core Features

- User registration and login
- Google social authentication
- Sword upload, edit, and delete flows
- Global feed
- Discussion page
- Profile pages
- Mobile navigation with hamburger menu
- Theme toggle in the main navbar

## Authentication Setup

Google sign-in requires real OAuth credentials from Google Cloud Console.

Add these values to `.env` and your Azure App Service settings:

```env
GOOGLE_CLIENT_ID=your_google_client_id
GOOGLE_CLIENT_SECRET=your_google_client_secret
APP_URL=https://your-app-name.azurewebsites.net
```

Use this callback URL in Google Cloud Console:

- `https://your-app-name.azurewebsites.net/auth/google/callback`

## Local Setup

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm run build
```

## Azure Deployment Notes

- Deploy to Azure App Service using PHP 8.2.
- Set `APP_KEY`, `APP_URL`, database settings, and Google OAuth variables in App Service configuration.
- Run migrations after deployment.
- If Azure shows `403 Forbidden` from nginx, set the App Service Startup Command to `bash /home/site/wwwroot/startup.sh` so nginx serves `public/` instead of the app root.
- If you use the placeholder file fix, rename `hostingstart.html` out of the way first.
- Add the public site URL to this README before submission.

## Live Site

- Public URL: replace with your Azure URL
