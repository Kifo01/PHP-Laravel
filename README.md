# Northstar POS Foundations

Northstar is a four-page Point-of-Sale foundation built with CodeIgniter 4. It demonstrates explicit routing, MVC controller and view separation, a shared layout, and account records retrieved from a MySQL database.

## Pages

- `/` - POS dashboard and quick links
- `/about` - project purpose and MVC overview
- `/customers` - customer names, email addresses, and phone numbers
- `/users` - staff usernames, full names, and roles

Customer and user records are retrieved through CodeIgniter Models from the `northstar_pos` MySQL database.

## Requirements

- PHP 8.2 or newer
- Composer
- PHP extensions required by CodeIgniter 4, including `intl` and `mbstring`
- MAMP, Apache, or the CodeIgniter development server

## Setup

1. Install dependencies with `composer install`.
2. Create `.env` if it is not present and configure the `northstar_pos` MySQL connection.
3. Ensure `writable/` can be written by the web server.
4. Point the web root to `public/`, or use the included root `.htaccess` when running the project under MAMP at `/PHP-Laravel/`.

For the current MAMP folder and default MAMP port, the configured local URL is:

```text
http://localhost:8888/PHP-Laravel/
```

Alternatively, start the built-in development server:

```bash
php spark serve
```

Then visit `http://localhost:8080/`.

## Project Structure

```text
app/Config/Routes.php           Explicit routes for all four pages
app/Controllers/Pages.php       Landing and about pages
app/Controllers/Customers.php   Customer database query
app/Controllers/Users.php       User database query
app/Models/CustomerModel.php    Customers table model
app/Models/UserModel.php        Users table model
app/Views/layouts/main.php      Shared navigation and page shell
app/Views/pages/                Landing and about views
app/Views/customers/            Customer listing view
app/Views/users/                User listing view
public/assets/css/app.css       Responsive visual styling
tests/feature/PosPagesTest.php  HTTP feature tests for every page
```

## Verification

List the registered routes:

```bash
php spark routes
```

Run the automated tests:

```bash
composer test
```

## Next Module

Export the `northstar_pos` database from phpMyAdmin and include the resulting SQL file with the repository submission.
