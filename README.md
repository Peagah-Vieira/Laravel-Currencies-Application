[![pt-br](https://img.shields.io/badge/lang-pt--br-green.svg)](https://github.com/Peagah-Vieira/Laravel-Currencies-Application/blob/main/README_BR.md)
# Laravel Currencies Web Application

A web application that consumes an external API to list and convert currencies built with Laravel.

Special thanks to [Amanda](https://github.com/seugirdorx) who made the [Figma design](https://www.figma.com/file/OZWH5JjFzwFDqO7G0UijYS/Projeto_Conversor?type=design&node-id=0-1&mode=design).
## Features

-   List and convert currencies through external API
-   Currencies conversion history
-   Social Accounts(Google, Github) using Laravel Socialite
-   Administration panel with more informations about currencies
-   Register with email verification
-   Reset password through email
-   Authentication middleware using Breeze
-   PHPUnit test and Browsers tests using Laravel Dusk

## Screenshots

<details>
  <summary>Admin Dashboard</summary>

  ![admin_dashboard](https://github.com/Peagah-Vieira/Laravel-Currencies-Application/assets/105545343/265b355c-3bd2-4d82-a2c0-4af69f094ed5)

</details>

<details>
  <summary>Conversion Histories</summary>

  ![conversion_histories](https://github.com/Peagah-Vieira/Laravel-Currencies-Application/assets/105545343/4f9fb84e-92f5-4546-9057-977050719c63)

</details>

<details>
  <summary>Currencies List</summary>

  ![currencies_list](https://github.com/Peagah-Vieira/Laravel-Currencies-Application/assets/105545343/b449ba87-e788-4fa5-ac0f-f0fb0fe0d957)

</details>

## Running locally

Clone the project

```bash
git clone  https://github.com/Peagah-Vieira/Laravel-Currencies-Application.git
```

Switch to the repo folder

```bash
cd Laravel-Currencies-Application
```

Install all the dependencies using composer

```bash
composer install
```

Install all the dependencies using npm

```bash
npm install
```

Copy the example env file and make the required configuration changes in the .env file

```bash
cp .env.example .env
```

Generate a new application key

```bash
php artisan key:generate
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

[Filament](https://filamentphp.com)
