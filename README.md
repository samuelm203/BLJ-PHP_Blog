# PHP Blog

A lightweight blogging platform built with vanilla PHP and a simple MVC-like structure. It supports user authentication, creating posts with optional images, profile pages, a friends page, and more — designed to run locally with XAMPP.

> Last updated: 2025-12-02 20:03 (local)


## ✨ Features

- User signup, login, logout
- Create and read blog posts (optional image URL validation)
- Profile page and friends page
- Basic password reset flow
- Clean views with a shared header/footer template
- Simple routing via `routes.php`


## 🧱 Tech Stack

- PHP (vanilla)
- MySQL (via PDO)
- HTML/CSS
- XAMPP for local development

Notes:
- No Composer or NPM package manager is used in this project at the moment.
- Credentials are currently stored in code (see `blog\core\database.php`). See the Environment section for TODOs to externalize.

## ✅ Requirements

- XAMPP (Apache + MySQL)
- PHP with PDO MySQL driver enabled
- A MySQL database you can connect to (local or remote)


## 🗂️ Project Structure

```
C:\xampp\htdocs\
├─ README.md                # This file (repo root)
└─ blog\
   ├─ core\
   │  ├─ database.php          # DB connection (PDO)
   │  └─ logout.php            # Ends the session
   ├─ css\
   │  └─ styles.css            # Global styles
   ├─ images\
   │  ├─ 404.png               # 404 illustration
   │  └─ 503.png               # 503 illustration / placeholder
   ├─ models\                  # Page handlers / data access
   │  ├─ blog_model.php
   │  ├─ home_model.php
   │  ├─ login_model.php
   │  ├─ profil_model.php
   │  ├─ resetpassword_model.php
   │  ├─ seemyblogpost_model.php
   │  ├─ signup_model.php
   │  └─ write_model.php
   ├─ views\
   │  ├─ 404_view.php
   │  ├─ about_view.php
   │  ├─ blog_view.php
   │  ├─ friends_view.php
   │  ├─ home_view.php
   │  ├─ login_view.php
   │  ├─ notfinished_view.php
   │  ├─ profil_view.php
   │  ├─ signup_view.php
   │  ├─ write_view.php
   │  └─ templates\
   │     ├─ header.php
   │     └─ footer.php
   ├─ index.php                # Front controller / entry point
   └─ routes.php               # Route definitions
```


## 📊 Project Statistics

Static counts based on the repository at the time of writing (snapshot):

- Total files in `blog/`: 27
- PHP files in `blog/`: 24
- CSS files: 1
- Image assets: 2
- Models: 8
- Views (including templates): 12

## 🚀 Getting Started (Local with XAMPP)

1. Place the project under your XAMPP `htdocs` folder as `C:\xampp\htdocs\blog`.
2. Ensure Apache and MySQL are running via XAMPP Control Panel.
3. Create a MySQL database and user. Update DB credentials in `blog\core\database.php` if needed.
4. Import your schema (tables like `user`, `post`, etc.). If you don’t have a SQL dump yet, create tables manually matching what the models expect. See TODO below.
5. Open in the browser: `http://localhost/blog/`

Entry point: `blog\index.php` loads `blog\routes.php`, which includes the appropriate view based on the URL segment.


## 🔐 Configuration

- Database connection is handled by `blog\core\database.php` via helpers `connectToLocalDatabase()` and `connectToDatabase()` (PDO).
- Sessions are used to track user authentication (`$_SESSION['user_id']`).


## 🧭 Main Pages

Common routes/pages in this project include:

- Home: `/`
- Blog/Read: `/blog` or `/read`
- Write: `/write`
- Login: `/login`
- Signup: `/signup`
- Profile: `/profil`
- Friends: `/friends`
- About: `/about`
- 404: `/404`

Note: Actual paths are defined in `blog\routes.php`.

## 📜 Routes and Entry Points

- Front controller: `blog\index.php`
- Router: `blog\routes.php`
- Routing strategy: checks the last segment of `REQUEST_URI` and includes the corresponding view or handler.
- Examples:
  - `/blog` → home (`views/home_view.php`)
  - `/blog/login` → login view
  - `/blog/profil` → profile view (requires session)
  - Unmatched → `views/404_view.php` with HTTP 404

## 📦 Scripts / Package Management

- There are currently no package manager scripts (no Composer, no NPM). All PHP is run by Apache via XAMPP.
- Common developer actions:
  - Start Apache and MySQL in XAMPP
  - Open `http://localhost/blog/`


## 🛠️ Development Notes

- Input is sanitized using `htmlspecialchars()` and server-side checks before DB writes.
- Image field for posts may accept a URL and can be validated (e.g., with `getimagesize()` in the model layer if implemented).
- Views are composed with `views\templates\header.php` and `views\templates\footer.php`.

## 🔧 Environment Variables (TODO)

Currently, database credentials are hard-coded in `blog\core\database.php` for both local and remote connections. To improve security and portability, consider moving these to environment variables or a non-versioned config file.

Suggested (example) variables:

```
DB_HOST=localhost
DB_NAME=blog_samuel
DB_USER=root
DB_PASS=
```

Status: TODO — not implemented yet.

## 🧪 Tests

There is no automated test suite configured in this repository yet.

Recommended next steps (TODO):
- Add PHPUnit as a dev dependency (via Composer) and configure a basic test bootstrap.
- Add unit tests around models (e.g., input validation) and integration tests for routing.


## 🧪 Quick Manual Test Guide

1. Signup and login flows (invalid inputs, existing users, wrong password).
2. Create a new post with:
   - No image
   - Valid image URL
   - Invalid image URL (should be ignored gracefully)
3. Navigate to Profile and Friends pages.
4. Logout and confirm protected pages redirect to Login.

## 🗄️ Database Schema (TODO)

An SQL dump or migration scripts are not included. Based on the code, expected tables likely include:
- `user (UserId, Name, Email, Password, ...)`
- `post (PostId, Titel, Content, Image, UserID, Timestamp, ...)`

Action items:
- Produce a repeatable schema (SQL file) and place it under something like `db/schema.sql`.
- Document any required indexes and foreign keys.

## 📄 License

This project is currently unlicensed. 
