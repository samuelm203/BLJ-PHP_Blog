# PHP Blog — Mini MVC

A lightweight blogging platform built with vanilla PHP and a simple MVC-like structure. It supports user authentication, creating posts with optional images, profile pages, a friends page, and more — designed to run locally with XAMPP.

> Last updated: 2025-11-28 15:33 (local)


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


## 🗂️ Project Structure

```
blog/
├─ core/
│  ├─ database.php          # DB connection (PDO)
│  └─ logout.php            # Ends the session
├─ css/
│  └─ styles.css            # Global styles
├─ images/
│  └─ 404.png               # 404 illustration
├─ models/                  # Controllers/handlers for each page
│  ├─ blog_model.php
│  ├─ home_model.php
│  ├─ login_model.php
│  ├─ profil_model.php
│  ├─ resetpassword_model.php
│  ├─ signup_model.php
│  └─ write_model.php
├─ views/
│  ├─ 404_view.php
│  ├─ about_view.php
│  ├─ blog_view.php
│  ├─ friends_view.php
│  ├─ home_view.php
│  ├─ login_view.php
│  ├─ profil_view.php
│  ├─ signup_view.php
│  ├─ write_view.php
│  └─ templates/
│     ├─ header.php
│     └─ footer.php
├─ index.php                # Front controller / entry point
├─ routes.php               # Route definitions
└─ README.md                # This file
```


## 📊 Project Statistics

Static counts based on the repository at the time of writing:

- Total files in `blog/`: 24
- PHP files: 22
- CSS files: 1
- Image assets: 1
- Models: 7
- Views (including templates): 11

Want up-to-date stats on your machine? Run one of the following in PowerShell from the `blog` folder:

```
# Count files by extension
Get-ChildItem -Recurse | Group-Object { $_.Extension } | Sort-Object Count -Descending | Select-Object Count, Name

# Count PHP files
(Get-ChildItem -Recurse -Filter *.php | Measure-Object).Count

# Lines of code (rough): PHP + CSS + routes + index
(Get-ChildItem -Recurse -Include *.php,*.css | Get-Content | Measure-Object -Line).Lines
```


## 🚀 Getting Started (Local with XAMPP)

1. Place the project under your XAMPP `htdocs` folder as `C:\xampp\htdocs\blog`.
2. Ensure Apache and MySQL are running via XAMPP Control Panel.
3. Create a MySQL database and user. Update DB credentials in `core\database.php` if needed.
4. Import your schema (tables like `post`, `user`, etc.). If you don’t have a SQL dump yet, create tables manually matching the models (e.g., `post(Titel, Content, Image, UserID, Timestamp)`).
5. Open in the browser: `http://localhost/blog/`


## 🔐 Configuration

- Database connection is handled by `core\database.php` through a helper such as `connectToLocalDatabase()` (PDO).
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

Note: Actual paths are defined in `routes.php`.


## 🛠️ Development Notes

- Input is sanitized using `htmlspecialchars()` and server-side checks before DB writes.
- Image field for posts accepts a URL and is validated with a lightweight check via `getimagesize()`.
- Views are kept simple and composed with `views\templates\header.php` and `views\templates\footer.php`.


## 🧪 Quick Manual Test Guide

1. Signup and login flows (invalid inputs, existing users, wrong password).
2. Create a new post with:
   - No image
   - Valid image URL
   - Invalid image URL (should be ignored gracefully)
3. Navigate to Profile and Friends pages.
4. Logout and confirm protected pages redirect to Login.


## 📸 Screenshots

Add your screenshots to this section. For example:

```
![Home](images/home.png)
![Post](images/post.png)
```


## 📄 License

This project is currently unlicensed. Consider adding a license (e.g., MIT) if you plan to share it publicly.
