[![pt-br](https://img.shields.io/badge/lang-pt--br-green.svg)](https://github.com/Peagah-Vieira/Laravel-Currencies-Application/blob/main/README_BR.md)
# Laravel Currencies Web Application

A web application that consumes an external API to list and convert currencies built with Laravel.

Special thanks to [Amanda](https://github.com/seugirdorx) who made the [Figma design](https://www.figma.com/file/OZWH5JjFzwFDqO7G0UijYS/Projeto_Conversor?type=design&node-id=0-1&mode=design).

## Features

-   List and convert currencies through external API
-   Currencies conversion history
-   UUID instead ID as primary key
-   Social Accounts(Google, Github) using Laravel Socialite
-   Administration panel with more informations about currencies
-   Register with email verification
-   Reset password through email
-   Authentication middleware using Breeze
-   PHPUnit test and Browsers tests using Laravel Dusk

## Screenshots

<details>
  <summary>Homepage</summary>

  ![Página Principal](https://github.com/Peagah-Vieira/Laravel-Currencies-Application/assets/105545343/3702fbe7-aa06-4117-99d6-3146b1851d73)

</details>

<details>
  <summary>Register</summary>

  ![Cadastro](https://github.com/Peagah-Vieira/Laravel-Currencies-Application/assets/105545343/b44f4b1f-0137-4fab-b28e-0b7da8db7181)

</details>

<details>
  <summary>Login</summary>

  ![Login](https://github.com/Peagah-Vieira/Laravel-Currencies-Application/assets/105545343/1768b916-d760-4e77-9fd0-4c7b481b6193)

</details>


<details>
  <summary>Admin Dashboard</summary>

  ![AdminPanel](https://github.com/Peagah-Vieira/Laravel-Currencies-Application/assets/105545343/efd0aa46-8947-4048-9490-685f343899ff)

</details>

<details>
  <summary>Conversion Histories</summary>

  ![conversion_histories](https://github.com/Peagah-Vieira/Laravel-Currencies-Application/assets/105545343/4f9fb84e-92f5-4546-9057-977050719c63)

</details>

<details>
  <summary>Currencies List</summary>

  ![CurrenciesList](https://github.com/Peagah-Vieira/Laravel-Currencies-Application/assets/105545343/d1fffb64-802c-4cff-b5b8-1f298ae5f662)

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

Install all the dependencies using npm

```bash
npm install
```

Build CSS and JS assets

```bash
npm run build
```

Install all the dependencies using composer

```bash
composer install
```

Copy the example env file and make the required configuration changes in the .env file

```bash
cp .env.example .env
```

Generate a new application key

```bash
php artisan key:generate
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

Benefits of Switching to UUIDs:

(https://www.westagilelabs.com/blog/say-goodbye-to-auto-increment-ids-the-benefits-of-switching-to-uuids/)

## Documentation

[PHP](https://www.php.net)

[Laravel](https://laravel.com)

[Currency List](https://app.freecurrencyapi.com/)

[Currency Converter](https://rapidapi.com/apininjas/api/currency-converter-by-api-ninjas/)

[Filament](https://filamentphp.com)
