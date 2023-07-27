# Laravel Currencies Web Application

Um aplicativo da web que consome uma API externa para listar e converter moedas criadas com o Laravel.

## Funcionalidades

-   List and convert currencies through external API
-   Currencies conversion history
-   Social Accounts(Google, Github) using Laravel Socialite
-   Administration panel with more informations about currencies
-   Register with email verification
-   Reset password through email
-   Authentication middleware using Breeze
-   PHPUnit test and Browsers tests using Laravel Dusk

## Executando localmente

Clonar o projeto

```bash
git clone  https://github.com/Peagah-Vieira/Laravel-Currencies-Application.git
```

Alternar para a pasta repo

```bash
cd Laravel-Currencies-Application
```

Instale todas as dependências usando o composer

```bash
composer install
```

Instale todas as dependências usando npm

```bash
npm install
```

Copie o arquivo env de exemplo e faça as alterações de configuração necessárias no arquivo .env

```bash
cp .env.example .env
```

Gerar uma nova chave de aplicativo

```bash
php artisan key:generate
```

Crie ativos CSS e JS

```bash
npm run dev
```

Iniciar o servidor

```bash
php artisan serve
```

## Executando os testes

Para executar os testes PHPUnit, execute o seguinte comando

```bash
php artisan test
```

Para executar os testes do navegador Laravel Dusk, execute o seguinte comando

```bash
php
```

## Aprendizados

Laravel Breeze:

(https://laravel.com/docs/10.x/starter-kits)

Testes PHPUnit no Laravel:

(https://semaphoreci.com/community/tutorials/getting-started-with-phpunit-in-laravel)

Testes de navegador com Laravel Dusk:

(https://laravel.com/docs/10.x/dusk)

## Documentação

[PHP](https://www.php.net)

[Laravel](https://laravel.com)

[Currency List](https://app.freecurrencyapi.com/)

[Currency Converter](https://rapidapi.com/apininjas/api/currency-converter-by-api-ninjas/)

[Filament](https://filamentphp.com)
