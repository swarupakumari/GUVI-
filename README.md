# 🔐 Full Stack Authentication System(GUVI-Assesement)

A complete full-stack authentication system built using PHP, MySQL, Redis, and MongoDB Atlas with secure session handling and modern UI.

---

## 🚀 Features

- ✅ User Registration (MySQL + Prepared Statements)
- ✅ User Login with Password Hashing (bcrypt)
- ✅ Secure Session Management using Redis
- ✅ Session stored in LocalStorage (Frontend)
- ✅ Profile Management using MongoDB Atlas
- ✅ AJAX-based communication (No page reload)
- ✅ Clean and modern UI using Bootstrap

---

## 🧠 Tech Stack

### Frontend
- HTML
- CSS (Bootstrap)
- JavaScript
- jQuery (AJAX)

### Backend
- PHP

### Databases
- MySQL → Authentication (Register/Login)
- Redis → Session Storage
- MongoDB Atlas → User Profile Data

---

## 🔄 Project Flow
Register → MySQL
Login → Verify → Redis Session → LocalStorage
Profile → Validate Session → MongoDB Save

## 📁 Project Structure
auth_project/
│
├── assets/
│ ├── css/
│ └── js/
│ ├── register.js
│ ├── login.js
│ └── profile.js
│
├── php/
│ ├── config.php
│ ├── redis.php
│ ├── mongo.php
│ ├── register.php
│ ├── login.php
│ └── profile.php
│
├── register.html
├── login.html
├── profile.html
├── .env
├── .gitignore
└── README.md


## 🛠️ What I Implemented

### 🔐 Authentication System (MySQL)
- Designed and implemented user registration and login system using MySQL
- Used **Prepared Statements** to prevent SQL injection
- Implemented **password hashing (bcrypt)** for secure password storage
- Validated user credentials during login

---

### ⚡ Session Management (Redis + LocalStorage)
- Generated unique `session_id` after successful login
- Stored session data in **Redis (backend)**
- Stored `session_id` in **LocalStorage (frontend)**
- Used session_id for authentication in protected routes

---

### 👤 Profile Management (MongoDB Atlas)
- Integrated **MongoDB Atlas (cloud database)** for storing user profile data
- Stored user details like:
  - Age
  - Date of Birth
  - Contact Number
- Verified user session using Redis before saving profile data
- Used **upsert operation** to update or insert profile data

---

### 🔄 AJAX-Based Communication
- Implemented all operations using **jQuery AJAX**
- No page reloads (dynamic interaction)
- Seamless frontend-backend communication

---

### 🎨 Frontend UI
- Built responsive UI using **Bootstrap**
- Designed modern forms for:
  - Register
  - Login
  - Profile
- Added **Logout functionality** using LocalStorage
