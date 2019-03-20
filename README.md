# Full Stack Test

## 1. Challenge (API)

---

#### This api has been developed with Laravel and MySQL

To run this project please clone

```bash
git@github.com:f0ntana/fullstack-test-api.git
```

Enter in the folder

```bash
cd fullstack-test-api
```

Copy .env.example to .env

```bash
cp .env.example .env
```

Open and edit database config.

```mysql
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=coderockr
DB_USERNAME=root
DB_PASSWORD=root
```

Now, run composer to install the dependencies

```bash
composer install
```

when it's finished run migrate

```bash
php artisan migrate
```

To start server

```bash
php artisan serve
```
