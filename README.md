<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# API Laravel (PHP + Eloquent)

Descrição
-------

Projeto simples de API REST construída com PHP e Laravel. Este repositório demonstra um backend leve usando Eloquent ORM, com modelos básicos como `User` e `Profile` (perfil). O objetivo é servir como exemplo de estrutura, configuração e rotas REST para operações básicas de CRUD.

Principais tecnologias
---------------------

- PHP (8.2 recomendado)
- Laravel 12.x
- Eloquent ORM 12.x
- MySQL / MariaDB (configurável via `.env`)
- Composer

Estrutura do projeto (resumo)
-----------------------------

- `routes/api.php` - rotas da API
- `app/Models/User.php` - modelo `User`
- `app/Models/Profile.php` - modelo `Profile` (relacionado a `User`)
- `database/migrations/` - migrations para criar tabelas
- `database/seeders/` - seeders e factories (opcional)
- `.env` - variáveis de ambiente (credenciais e URL do banco)

Pré-requisitos
--------------

- PHP 8.2+ instalado
- Composer
- Um servidor MySQL/MariaDB acessível

Dependências
------------

- Laravel 12.x
- Eloquent ORM 12.x
- Composer packages descritos no `composer.json`

Instalação
----------

1. Clone o repositório:

```bash
git clone <url-do-repo>
cd api
```

2. Instale dependências PHP via Composer:

```bash
composer install
```

3. Copie o `.env` de exemplo e gere a chave da aplicação:

```bash
cp .env.example .env
php artisan key:generate
```

Configuração (`.env`)
--------------------

Edite o arquivo `.env` na raiz do projeto e configure as variáveis de conexão com o banco de dados. Exemplo para MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_api_2026
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

Migrations e seeders
--------------------

Após configurar o `.env`, execute as migrations para criar as tabelas:

```bash
php artisan migrate
```

Se quiser recriar o banco e popular com seeders (quando houver):

```bash
php artisan migrate:fresh --seed
```

Executando a aplicação
----------------------

Para rodar o servidor de desenvolvimento:

```bash
php artisan serve --host=127.0.0.1 --port=8000
```

Ou use sua stack preferida (Valet, Sail, Docker, etc.). A API ficará acessível em `http://127.0.0.1:8000` por padrão.

Versão da linguagem e ORM
------------------------

- Versão da linguagem: PHP 8.2
- Versão do ORM: Eloquent ORM 12.x

Rotas REST
----------

A API expõe endpoints para gerenciamento de usuário e perfil. As rotas típicas estão em `routes/api.php`.

| Método | URL                 | Descrição                           |
| ------ | ------------------- | ----------------------------------- |
| POST   | `/api/usuario`      | Criar usuário + perfil              |
| GET    | `/api/usuario`      | Listar todos usuários com perfil    |
| GET    | `/api/usuario/{id}` | Listar 1 usuário pelo ID com perfil |
| PUT    | `/api/usuario/{id}` | Atualizar usuário                   |
| DELETE | `/api/usuario/{id}` | Deletar usuário                     |

Exemplos rápidos / requests cURL
-------------------------------

GET todos usuários:

```bash
curl -X GET http://127.0.0.1:8000/api/usuario
```

Criar usuário (exemplo JSON):

```bash
curl -X POST http://127.0.0.1:8000/api/usuario \
	-H "Content-Type: application/json" \
	-d '{"name":"João","email":"joao@example.com","password":"senha123","perfil_nome":"Administrador"}'
```

Boas práticas de desenvolvimento
-------------------------------

- Mantenha o `.env` fora do controle de versão (verifique `.gitignore`).
- Use migrations para versionar mudanças no banco (`php artisan migrate`).
- Use seeders e factories para dados de desenvolvimento e testes.
- Rode os testes com `php artisan test` ou `vendor/bin/phpunit`.
- Gere documentação de endpoints ou use ferramentas como OpenAPI/Swagger quando o projeto crescer.
