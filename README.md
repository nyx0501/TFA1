## Pages

| Route        | Controller            | Description                                   |
|--------------|------------------------|------------------------------------------------|
| `/`          | `Pages::index`          | Landing page                                    |
| `/about`     | `Pages::about`          | About page                                      |
| `/customers` | `Customers::index`      | Lists customers (full name, email, phone) from a static array |
| `/users`     | `Users::index`          | Lists users/staff (username, full name, role) from a static array |

## Software Used

PHP 8.5
CodeIgniter 4

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
