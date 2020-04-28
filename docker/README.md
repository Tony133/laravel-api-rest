# Use docker

## Build & Start Docker container

```bash
docker-compose build
docker-compose up -d
```

## Install with Composer 

```bash
docker-compose exec http composer install
```

## Set Environment

```bash
cp .env.docker .env
```

## Set the application key

```bash
docker-compose exec http php artisan key:generate
```

## Run migrations and seeds

```bash
docker-compose exec http php artisan migrate --seed
```

## Access API
http://localhost:8080/api/books

```text
ID  tony_admin@laravel.com
PW  admin
```
## Output OpenAPI yaml file(Swagger)

```bash
docker-compose exec http php vendor/bin/openapi \
       app/Http/Controllers/swagger-api.php \
       -o docs/openapi.yaml
```

## View SwaggerUI
http://localhost:8088

