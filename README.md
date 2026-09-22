# POS Foundations — CodeIgniter 4

First milestone of a basic Point-of-Sale (POS) system, built for **IT0049 — Web System
Technologies, Technical Formative Assessment 1: "From Zero to Four Pages."**

Four routed pages built with CodeIgniter 4's MVC layers (routing → controller → view).
The Customer Accounts and User Accounts pages use a **static PHP array** as a temporary
data source — no database is wired up yet.

## Pages

| Route        | Controller            | Description                                   |
|--------------|------------------------|------------------------------------------------|
| `/`          | `Pages::index`          | Landing page                                    |
| `/about`     | `Pages::about`          | About page                                      |
| `/customers` | `Customers::index`      | Lists customers (full name, email, phone) from a static array |
| `/users`     | `Users::index`          | Lists users/staff (username, full name, role) from a static array |

## Requirements

- PHP 8.1+
- Composer
- The PHP extensions CodeIgniter 4 needs: `intl`, `mbstring`

## Setup & Run Locally

1. Clone the repository and move into it:
   ```bash
   git clone <your-repo-url>
   cd myproject
   ```
2. Install dependencies:
   ```bash
   composer install
   ```
3. Create your `.env` file from the example and configure it:
   ```bash
   cp env .env
   ```
   Then in `.env`, uncomment and set:
   ```
   CI_ENVIRONMENT = development
   app.baseURL = 'http://localhost:8080/'
   ```
4. Start the built-in PHP server:
   ```bash
   php spark serve
   ```
   or
   ```bash
   php -S localhost:8080 -t public
   ```
5. Visit `http://localhost:8080/` in your browser and use the nav bar to reach
   About, Customer Accounts, and User Accounts.

## Project Structure Notes

- `app/Controllers/Pages.php` — landing (`index`) and about (`about`) actions.
- `app/Controllers/Customers.php` — defines a static array of 5 sample customer
  records and passes it to the view.
- `app/Controllers/Users.php` — defines a static array of 5 sample user/staff
  records and passes it to the view.
- `app/Views/pages/` — landing and about templates.
- `app/Views/customers/index.php` / `app/Views/users/index.php` — loop through
  the static array data with `foreach` to render an HTML table.
- `app/Views/templates/header.php` / `footer.php` — shared layout and navigation
  bar included on every page.
- `app/Config/Routes.php` — the four registered GET routes.

## Deployment

Point your host's document root at the `public/` folder, set `CI_ENVIRONMENT`
to `production` and `app.baseURL` to your live domain in the server's `.env`,
then run `composer install --no-dev` on the server (or upload the `vendor/`
folder as part of the deploy).
