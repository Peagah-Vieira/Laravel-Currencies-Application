# Laravel Currencies Web Application

A web application to list and convert currencies built with Laravel.

## Features

-   Register with email verification
-   Reset password through email
-   List and convert currencies
-   Authentication middleware using Breeze
-   PHPUnit test and Browsers tests using Laravel Dusk

## Running locally

Clone the project

```bash
git clone  https://github.com/Peagah-Vieira/Laravel-Currencies-Application
```

Install the dependencies

```bash
composer install
npm install
```

Change environment variables

```bash
# Laravel Configuration
# APP_NAME=Laravel-Currency
# APP_ENV=local
# APP_KEY="CHANGE-ME"
# APP_DEBUG=true
# APP_URL="CHANGE-ME"

# MySQL Configuration
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE="CHANGE-ME"
# DB_USERNAME="CHANGE-ME"
# DB_PASSWORD="CHANGE-ME"

# PostgreSQL Configuration
# DB_CONNECTION=pgsql
# DB_HOST=127.0.0.1
# DB_PORT=5432
# DB_DATABASE="CHANGE-ME"
# DB_USERNAME="CHANGE-ME"
# DB_PASSWORD="CHANGE-ME"

# Mailer Configuration
# MAIL_MAILER=smtp
# MAIL_HOST=smtp.gmail.com
# MAIL_PORT=465
# MAIL_USERNAME="CHANGE-ME"
# MAIL_PASSWORD="CHANGE-ME"
# MAIL_ENCRYPTION="CHANGE-ME"
# MAIL_FROM_ADDRESS="CHANGE-ME"
# MAIL_FROM_NAME="CHANGE-ME"

# Currency list API Configuration
# CURRENCY_API_LIST_URL="CHANGE-ME"
# CURRENCY_API_LIST_KEY="CHANGE-ME"

# Currency convert API Configuration
# CURRENCY_API_CONVERT_URL ="CHANGE-ME"
# CURRENCY_API_CONVERT_KEY ="CHANGE-ME"
```

Build CSS and JS assets

```bash
npm run dev
```

Start the server

```bash
php artisan serve
```

## Running the tests

To run the PHPUnit tests, run the following command

```bash
php artisan test
```

To run the Laravel Dusk browser tests, run the following command

```bash
php artisan dusk
```

## Learnings

Laravel Breeze:

(https://laravel.com/docs/10.x/starter-kits)

PHPUnit tests in Laravel:

(https://semaphoreci.com/community/tutorials/getting-started-with-phpunit-in-laravel)

Browser tests with Laravel Dusk:

(https://laravel.com/docs/10.x/dusk)

## Documentation

[PHP](https://www.php.net)

[Laravel](https://laravel.com)

[Currency List](https://app.freecurrencyapi.com/)

[Currency Converter](https://rapidapi.com/apininjas/api/currency-converter-by-api-ninjas/)
