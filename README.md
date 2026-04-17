# ⚔️ Sword Showcase Hub

A Laravel MVC web app where users upload, browse, and discuss swords.

Think Instagram + Reddit but for sword collectors.

---

## 📌 What it does

- Users can register and log in
- Upload swords (image + description)
- Browse a public sword feed
- Like and follow users
- View profiles
- Join discussions (posts + comments)

---

## ❗ Problem

No dedicated place for sword fans to:
- showcase collections
- discover swords
- talk about swords

This app fixes that.

---

## 👤 Users

### Sword Collector
- upload swords
- edit/delete their posts
- build profile collection

### Guest User
- browse swords
- view profiles
- read discussions

---

## 🚀 Features

- Sword CRUD system
- Public feed
- User profiles
- Likes system
- Follow system
- Discussion posts + comments
- Sword order requests

---

## 💬 Discussions

- Users create posts
- Users comment on posts
- Simple Reddit-style threads
- Chronological feed

---

## 🛠 Tech Stack

- Laravel
- PHP
- MySQL
- Blade
- JavaScript
- Vite

---

## 🧱 MVC Structure

- Models: User, Sword, Post, Comment, Like, Follow, Order
- Views: feed, profile, discussions, upload
- Controllers: SwordController, AuthController, FollowController

---

## 🔁 CRUD

- Swords → full CRUD
- Posts → create/read
- Comments → create/read
- Likes → toggle

---

## 🌐 Routes

- /feed → sword feed
- /upload → add sword
- /profile → user page
- /discussions → posts feed
- /posts/{id} → single post

---

## ⚠️ Notes

- Session login (not full Laravel auth)
- No real-time chat
- Discussions are simple threads

---

## ⚙️ Setup

```bash
composer install
npm install

cp .env.example .env
php artisan key:generate

php artisan migrate

php artisan serve