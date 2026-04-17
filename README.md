# ⚔️ Sword Showcase Hub

A visual-first sword community platform where users can upload, showcase, and discuss different sword types ranging from historical blades like claymores and bastard swords to modern-inspired fantasy designs.

Sword Showcase Hub is a Laravel MVC web application designed to combine community posting, user profiles, marketplace-style sword orders, and Reddit-inspired discussions into a single unified platform for sword enthusiasts.

---

## 📌 Table of Contents
- Project Overview
- Problem Statement
- User Personas
- Features
- Tech Stack
- System Architecture (MVC)
- Core Functionalities (CRUD)
- Discussions System
- UX Design
- Database Overview
- Routes Overview
- Git & Development Process
- Assumptions & Limitations
- Setup Instructions

---

## 🧠 Project Overview

Sword Showcase Hub was developed as part of the CA2 Server-Side Development module. The aim was to build a dynamic Laravel MVC application that allows users to upload, browse, and interact with sword-related content in a structured and community-driven environment.

The platform supports user authentication, sword uploads, profile systems, engagement features (likes/follows), a shop-style order system, and a Reddit-inspired discussion forum.

---

## ❗ Problem Statement

There is no centralised platform dedicated specifically to sword enthusiasts where users can:
- Showcase their sword collections
- Discover different sword types
- Engage in structured community discussions
- Interact with other collectors

Sword Showcase Hub solves this by providing a dedicated, organised, and visually-driven platform for sword content and community interaction.

---

## 👤 User Personas

### Persona 1: Sword Enthusiast (Registered User)

**Goals:**
- Upload and showcase personal swords
- Edit and manage their sword posts
- Build a public profile of their collection

**Needs:**
- Simple upload system (images + descriptions)
- Dashboard-style profile
- Full CRUD control over their content

---

### Persona 2: Intrigued Visitor (Guest User)

**Goals:**
- Browse swords without needing an account
- Explore different sword types and users

**Needs:**
- Read-only access to feed and profiles
- Smooth browsing experience to encourage registration

---

## 🚀 Features

### Core Features
- User registration & authentication (session-based)
- Sword upload system with images and metadata
- Full CRUD functionality for swords
- Public feed of uploaded swords
- User profile pages with collections
- Filtering and categorisation by sword type

### Extended Features (Beyond Original Scope)
- ❤️ Like system for swords
- 👥 Follow system between users
- 💬 Reddit-style Discussions system (Posts + Comments)
- 🛒 Sword order / shop request system
- 🧑 Public user profile browsing
- 🖼️ Enhanced feed grouping & sorting logic

---

## 🛠 Tech Stack

- Laravel 12 (MVC Framework)
- PHP 8+
- MySQL (Relational Database)
- Blade Templates
- JavaScript (vanilla interactions)
- Vite (asset bundling)
- CSS (custom styling)

---

## 🧱 System Architecture (MVC)

### Models
- User
- Sword
- Post (Discussions)
- Comment
- Like
- Follow
- SwordOrder

### Controllers
- SwordController
- AuthController
- FollowController
- SwordOrderController

### Views
- feed.blade.php
- profile.blade.php
- discussions.blade.php
- discussion-single.blade.php
- upload.blade.php

---

## 🔁 Core CRUD Functionality

The application demonstrates CRUD across multiple systems:

### Swords (Primary CRUD System)
- Create: Upload sword
- Read: Feed + profile views
- Update: Edit sword details
- Delete: Remove sword listing

### Discussions (Secondary CRUD System)
- Create: Create posts
- Read: View discussion feed + threads
- Update: Edit posts (if implemented)
- Delete: Remove posts (if implemented)

---

## 💬 Discussions System

A Reddit-inspired discussion layer was implemented to expand community interaction.

### Features:
- Thread-based posts
- Individual discussion pages
- User-linked posts
- Comment system
- Chronological feed ordering

### Purpose:
This system extends the application beyond a gallery-style feed into a community-driven platform where users can share knowledge, opinions, and engage in conversations about swords.

---

## 🎨 UX Design

- Clean card-based feed layout (Instagram-style grid inspiration)
- Dedicated navigation bar across all pages
- Profile-centric design for user identity
- Discussion threads structured for readability
- Mobile-responsive layout considerations

---

## 🗄 Database Overview

Key relationships:
- Users → Swords (1-to-many)
- Users → Posts (1-to-many)
- Posts → Comments (1-to-many)
- Users → Likes (many-to-many via table)
- Users → Followers (self-referencing relationship)

---

## 🌐 Routes Overview

### Core Routes
- `/welcome` – Landing page
- `/feed` – Sword feed
- `/upload` – Upload sword
- `/profile` – User dashboard
- `/user/{id}` – Public profile view

### Discussions
- `/discussions` – All posts feed
- `/posts/{post}` – Single discussion thread

### Auth
- `/login`
- `/register`
- `/logout`

---

## 🧪 Git & Development Process

The project was developed using Git version control with:
- Feature-based commits
- Branch development workflow
- Merge handling during feature integration
- Iterative improvement of UI and backend logic

AI-assisted development tools were used during debugging and feature expansion, but all implementation decisions and final integration were manually verified.

---

## ⚠️ Assumptions & Limitations

- Authentication uses session-based logic instead of full Laravel Breeze/Jetstream
- No real-time messaging system implemented
- Discussions are not nested (flat comment structure)
- No external API integration beyond internal system logic
- Marketplace ordering system is request-based, not transactional

---

## ⚙️ Setup Instructions

```bash
composer install
npm install

cp .env.example .env
php artisan key:generate

php artisan migrate

npm run build
php artisan serve