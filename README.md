# Sword Showcase Hub

<<<<<<< HEAD
A Laravel web application for users to share swords they crafted, bought, or collected.
Currently, our feed page, discussions oage and mini shop page have been fully completed with their functions also completed, effectively ensuring a great experience for the user. The Profile Page also has come together nicely giving the user their own space to show of their own swords. 

# User Experience 

This application was made with two user groups in mind, those who were sword enthuasists who'd make profiles given them access to their whole page and those only somewhat interested limiting their access but given them a taste in a 'guest' vire of sorts. We kept it this simple so that we did not have a scenario where the average user would struggle with the system so these two groups were considered to ensure a excellent experience 

# Implementation
We followed the CA2 Project Brief effectively as we could and also went back to our Project Plan to reevaluate what were our priority and what could we reconsider that we didnt consider before. I believe we used CRUD very well here, also establishing many database systems using Laravel migrations which helped populated our feed page, discussion form and the shop feed where users could buy swords put on order. 

# Overview 
Our Sword Showcase Hub is a fully functional Laravel application and I really enjoyed working through this project as it helped me get a better understanding of databases and dynamic multi page interfaces were used in the real world. It also felt nice to produce a site that felt like a full fledge application that was fully usable
=======
A Laravel-based web application for uploading, browsing, and discussing swords.  
Users can showcase swords, interact with other users, and participate in a discussion system similar to a forum-style feed.

---

## Project Overview

Sword Showcase Hub is a social-style platform built around sword collecting and sharing.  
Users can create accounts, upload swords with images and descriptions, browse a global feed, view profiles, and participate in discussions about sword types, builds, and showcases.

The system is built using Laravel MVC architecture and follows standard CRUD patterns for sword management and discussion posts.

---

## Tech Stack

| Layer        | Technology |
|--------------|------------|
| Framework    | Laravel 12 |
| Backend      | PHP 8.2+   |
| Frontend     | Blade Templates |
| Styling      | CSS (custom) |
| Database     | MySQL      |
| Auth         | Session-based authentication |
| Assets       | Vite (where applicable) |

---

## Core Features

### User System
- User registration and login
- Session-based authentication
- User profiles with uploaded swords
- Profile editing and image uploads

### Sword System (Main CRUD Feature)
- Create sword listings
- View global sword feed
- Edit sword posts
- Delete sword posts
- Upload images and descriptions
- Filter and display sword types

### Discussion System
- Forum-style discussion page
- Each sword can act as a discussion thread
- Individual discussion view per sword
- Comment system structure (in progress / expandable)
- Community interaction around sword posts

### Feed System
- Global feed of sword uploads
- Displays newest swords first
- Shows user info and timestamps

### Profile System
- User profile pages
- Displays user’s uploaded swords
- Sword count and activity overview

---

## Core Routes

### Public Routes
- `/welcome` → Landing page
- `/feed` → Global sword feed
- `/discussions` → Discussion index page
- `/discussions/{sword}` → Single sword discussion view
- `/profile` → User profile page
- `/user/{user}` → Public user profiles

### Auth Routes
- `/login` → Login page
- `/register` → Registration page
- `/logout` → Logout session

### Sword Routes (CRUD)
- `POST /swords` → Create sword
- `GET /swords/{sword}/edit` → Edit sword
- `PUT /swords/{sword}` → Update sword
- `DELETE /swords/{sword}` → Delete sword
- `POST /swords/{sword}/like` → Like system

### Uploads
- `/upload` → Upload sword page
- `/upload/swords` → Handle sword upload

---

## Local Setup

### Requirements
- PHP 8.2+
- Composer
- Node.js 18+
- MySQL or SQLite

### Installation Steps

```bash
git clone <repo-url>
cd sword-showcase-hub

composer install
npm install

cp .env.example .env
php artisan key:generate
>>>>>>> 7d96fc90d0370da36fcfd2c92d724363b7ace4af
