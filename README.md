# Arohya

Arohya is a PHP/MySQL-based e-commerce web application project focused on a responsive shopping experience, authentication, product browsing, and account-aware navigation.

## Highlights

- PHP-based web application with session-based authentication
- User registration, login, and logout flows
- Product browsing and shopping-oriented pages
- Cart entry point for authenticated and unauthenticated users
- Reusable header and footer components
- Responsive UI with mobile navigation
- Dark-themed storefront interface built with HTML and CSS
- MySQL connection layer for application data

## Tech Stack

- **Backend:** PHP
- **Database:** MySQL
- **Frontend:** HTML5, CSS3, JavaScript
- **UI:** Responsive CSS, Bootstrap-compatible web development approach
- **Tools:** Git, GitHub, VS Code

## Project Structure

```text
Arohya/
├── index.php
├── about.php
├── products.php
├── contact.php
├── contact_submit.php
├── login.php
├── register.php
├── logout.php
├── welcome.php
├── db.php
├── header.php
└── footer.php
```

## Core Flow

```text
User
  ↓
Register / Login
  ↓
Session-based authentication
  ↓
Storefront
  ├── Products
  ├── About
  ├── Contact
  └── Cart
```

## Local Setup

1. Clone the repository.
2. Place the project in your PHP server environment (for example, XAMPP/htdocs).
3. Create the required MySQL database and configure the connection in `db.php`.
4. Start Apache and MySQL.
5. Open the project through your local server.

## Notes

This repository is a portfolio/project codebase. Database credentials and other environment-specific secrets should remain outside version control.

## Author

**Ansh Singh**  
Full Stack PHP Developer

GitHub: [@ansh55560-ui](https://github.com/ansh55560-ui)
