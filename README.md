# Northstar POS Foundations

Northstar is a four-page Point-of-Sale foundation built with CodeIgniter 4. It demonstrates explicit routing, MVC controller and view separation, a shared layout, and account records retrieved from a MySQL database.

## Pages

- `/` - POS dashboard and quick links
- `/about` - project purpose and MVC overview
- `/customers` - customer list plus validated add and edit forms
- `/users` - staff list plus validated add and edit forms with optional avatars

Customer and user records are retrieved through CodeIgniter Models from the `northstar_pos` MySQL database.

## TFA3 Database Update

Before testing avatar uploads, select the `northstar_pos` database in phpMyAdmin, open the **SQL** tab, paste the contents of `database/tfa3_add_avatar.sql`, and click **Go**. This adds the `avatar` filename column required by the user edit form.

Uploaded JPG and PNG avatars are validated at a maximum of 2 MB. The application creates a 200 x 200 thumbnail in `public/uploads/avatars/` and saves only its filename in the database.

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
app/Controllers/Customers.php   Customer list, create, edit, and validation
app/Controllers/Users.php       User list, create, edit, validation, and avatars
app/Models/CustomerModel.php    Customers table model
app/Models/UserModel.php        Users table model
app/Views/layouts/main.php      Shared navigation and page shell
app/Views/pages/                Landing and about views
app/Views/customers/            Customer listing and form views
app/Views/users/                User listing and form views
database/tfa3_add_avatar.sql    SQL update for the users avatar column
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

## Submission

After running the TFA3 database update and testing the forms, export `northstar_pos` again from phpMyAdmin and replace `database/northstar_pos.sql` with the new export before committing.
