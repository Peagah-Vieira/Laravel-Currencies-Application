# Laravel Currencies Web Application

Um aplicativo da web que consome uma API externa para listar e converter moedas criadas com o Laravel.

Agradecimentos especiais para [Amanda](https://github.com/seugirdorx) quem fez o [Figma design](https://www.figma.com/file/OZWH5JjFzwFDqO7G0UijYS/Projeto_Conversor?type=design&node-id=0-1&mode=design).
## Funcionalidades

- Liste e converta moedas por meio de API externa
- Histórico de conversão de moedas
- UUID em vez de ID como chave primária
- Contas sociais (Google, Github) usando Laravel Socialite
- Painel de administração com mais informações sobre moedas
- Registre-se com verificação de e-mail
- Redefinir senha por e-mail
- Middleware de autenticação usando Breeze
- Teste de PHPUnit e testes de navegadores usando Laravel Dusk

## Capturas de tela

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

## Executando localmente

Clonar o projeto

```bash
git clone  https://github.com/Peagah-Vieira/Laravel-Currencies-Application.git
```

Alternar para a pasta repo

```bash
cd Laravel-Currencies-Application
```

Instale todas as dependências usando npm

```bash
npm install
```

Crie CSS e JS assets

```bash
npm run build
```

Instale todas as dependências usando o composer

```bash
composer install
```

Copie o arquivo env de exemplo e faça as alterações de configuração necessárias no arquivo .env

```bash
cp .env.example .env
```

Gerar uma nova chave de aplicativo

```bash
php artisan key:generate
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

Benefícios de mudar para UUIDs:

(https://www.westagilelabs.com/blog/say-goodbye-to-auto-increment-ids-the-benefits-of-switching-to-uuids/)

## Documentação

[PHP](https://www.php.net)

[Laravel](https://laravel.com)

[Currency List](https://app.freecurrencyapi.com/)

[Currency Converter](https://rapidapi.com/apininjas/api/currency-converter-by-api-ninjas/)

[Filament](https://filamentphp.com)
