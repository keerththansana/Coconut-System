# Coconut Health Monitoring System

An academic PHP/MySQL project that demonstrates how a coconut-health service (or resort-style wellness center) can collect reservations, contact requests, staff records, and facility descriptions through a simple public site plus an admin/staff back office.

![25](https://github.com/user-attachments/assets/71799b20-5578-47a4-8a7d-49f516889419)

## Features

- Public marketing site (`home.html`, `menu.html`, `offers.html`, `gallery.html`) with calls to action for reservations and contact.
- Reservation form (`reservation.html` → `reservation.php`) that stores guest details, visit date/time, and special requirements.
- Contact form (`contact.html` → `contact.php`) for general inquiries, surfaced in the admin dashboard.
- Facility directory with searchable descriptions (`facilities.php`, `facilityinsert.html`, `facilityview.php`).
- Role-based portal: administrators manage everything (`reservationview.php`, `contactview.php`, `staffview.php`), while staff accounts get a reservations-only view (`staffview2.php`).
- Staff CRUD: add, update, delete staff records (`staffinsert.html`, `edit_staff.php`, `delete_staff.php`).
- Simple session-based authentication handled by `login.php` using the `login` (admins) and `signup` (staff) tables.

## Project Structure

| Path | Purpose |
| ---- | ------- |
| `home.html`, `menu.html`, `offers.html`, `gallery.html` | Static marketing pages styled via `style2.css`. |
| `reservation.html` / `reservation.php` | Reservation form and persistence logic. |
| `contact.html` / `contact.php` | Contact form and persistence logic. |
| `facilities.php`, `facilityinsert.html`, `facilityview.php`, `facility.php` | Facility search plus admin creation and listing. |
| `staffinsert.html`, `staffview.php`, `staffview2.php`, `staff.php`, `edit_staff.php`, `delete_staff.php` | Staff management UI and handlers. |
| `reservationview.php`, `contactview.php` | Admin dashboards for stored data. |
| `login.html`, `login.php`, `login.css`, `admin.css` | Authentication UI and layout styles. |
| `config.php` | Central database connection helper (MySQL). |

## Technology Stack

- PHP 5.x style scripts using the legacy `mysql_*` extension (requires the extension to be enabled).
- MySQL / MariaDB database named `coconut_system`.
- HTML5/CSS3 frontend with minimal vanilla JS (mostly form handling).
- No composer/npm dependencies, so XAMPP/WAMP/Laragon setups work out of the box.

## Prerequisites

1. PHP runtime that still ships with the legacy `mysql` extension (PHP ≤5.6). If you need PHP 7+, refactor to MySQLi/PDO first.
2. MySQL or MariaDB server.
3. Web server stack (XAMPP, WAMP, MAMP, Laragon, etc.).
4. A database called `coconut_system` with the tables below.

## Quick Start

1. **Clone / copy** the project into your web root (e.g., `htdocs/Coconut_System`).  
2. **Create the database and tables** (run in phpMyAdmin or `mysql` CLI):

   ```sql
   CREATE DATABASE IF NOT EXISTS coconut_system;
   USE coconut_system;

   CREATE TABLE IF NOT EXISTS reservation (
     rid INT AUTO_INCREMENT PRIMARY KEY,
     rname VARCHAR(100) NOT NULL,
     remail VARCHAR(150) NOT NULL,
     rcontact VARCHAR(30) NOT NULL,
     rdate DATE NOT NULL,
     rtime TIME NOT NULL,
     specialrequest TEXT
   );

   CREATE TABLE IF NOT EXISTS contact (
     cid INT AUTO_INCREMENT PRIMARY KEY,
     cname VARCHAR(100) NOT NULL,
     cemail VARCHAR(150) NOT NULL,
     csubject VARCHAR(150) NOT NULL,
     cmessage TEXT NOT NULL
   );

   CREATE TABLE IF NOT EXISTS facility (
     fid INT AUTO_INCREMENT PRIMARY KEY,
     facility VARCHAR(150) NOT NULL,
     discription TEXT NOT NULL
   );

   CREATE TABLE IF NOT EXISTS signup (
     stid INT AUTO_INCREMENT PRIMARY KEY,
     susername VARCHAR(100) NOT NULL UNIQUE,
     semail VARCHAR(150) NOT NULL,
     spassword VARCHAR(255) NOT NULL,
     aaddress VARCHAR(255) NOT NULL
   );

   CREATE TABLE IF NOT EXISTS login (
     loginid INT AUTO_INCREMENT PRIMARY KEY,
     username VARCHAR(100) NOT NULL UNIQUE,
     password VARCHAR(255) NOT NULL
   );
   ```

3. **Seed credentials**:
   - Insert at least one admin row into `login` (these users land on `reservationview.php`).
   - Optionally pre-create staff rows in `signup` or use `staffinsert.html` once logged in.
4. **Configure database access**: update `config.php` if your MySQL host/user/password differ from the defaults (`root` / blank password on `localhost`).
5. **Start Apache + MySQL**, then visit `http://localhost/Coconut_System/home.html` for the public site or `http://localhost/Coconut_System/login.html` for the portal.

## Usage Guide

- **Public visitor flow:** browse overview pages, submit reservation/contact forms, or search facilities via the public `facilities.php` search box.
- **Admin flow:** log in with a `login` table account to access the navigation bar shown on the admin pages. From there you can review reservations, contacts, staff, and facilities, and create new records via the "Add" links.
- **Staff flow:** log in with credentials stored in the `signup` table to see `staffview2.php`, which lists reservations but hides other admin actions.
- **Editing content:** tweak the static HTML sections or swap hero imagery in `home.html`, `offers.html`, etc. Upload new assets alongside the existing `.jpg/.webp` files.

## Development Notes

- The codebase is intentionally simple and does not use MVC frameworks; each form posts to a dedicated PHP script.
- Because credentials are stored in plain text, add hashing (`password_hash`) before exposing this project publicly.
- Legacy `mysql_*` functions are deprecated—plan to migrate to MySQLi/PDO if you target PHP 7+.
- There is no CSRF or input sanitization. For production, validate and escape all inputs, add prepared statements, and tighten session handling.

## Troubleshooting

- **Blank pages or “can not be connected”**: confirm MySQL is running and credentials in `config.php` are correct.
- **Headers already sent** errors: ensure no stray whitespace precedes `<?php` or follows `?>` in edited PHP files.
- **Undefined index notices** on `facilities.php`: load the page via its search form or guard `$_POST` reads before use.
- **Styling missing**: make sure `admin.css`, `login.css`, and `style2.css` stay alongside their referenced HTML files.

## Next Steps / Ideas

- Replace deprecated MySQL calls with PDO + prepared statements.
- Add migrations or a `.sql` dump to automate database bootstrapping.
- Implement password hashing, role-based authorization middleware, and audit logs.
- Add client-side validation and toast/alert feedback for form submissions.

---
Enjoy building on top of the Coconut Health Monitoring System! If you improve it, document your updates here so the next maintainer knows how to get started quickly.

