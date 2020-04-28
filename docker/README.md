# The setting with docker

## Build & Start Docker container

```bash
    $ docker-compose build
    $ docker-compose up -d
```

## Install with Composer 

```bash
    $ docker-compose exec http composer install
```

## Set Environment

```bash
    $ cp .env.docker .env
```

## Set the application key

```bash
   $ docker-compose exec http php artisan key:generate
```

## Run migrations and seeds

```bash
   $ docker-compose exec http php artisan migrate --seed
```

## Check by browser
http://localhost:8080/api/books

```text
ID  tony_admin@laravel.com
PW  admin
```
