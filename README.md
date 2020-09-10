# Laravel Api Rest

[![Build Status](https://travis-ci.org/Tony133/laravel-api-rest.svg?branch=master)](https://travis-ci.org/Tony133/laravel-api-rest)

Simple example of a REST API with Laravel 8.x

## Install with Composer

```
    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar install or composer install
```

## Set Environment

```
    $ cp .env.example .env
```

## Set the application key

```
   $ php artisan key:generate
```

## Run migrations and seeds

```
   $ php artisan migrate --seed
```

## Getting with Curl

```
    $ curl -H 'content-type: application/json' -H 'Accept: application/json' -v -X GET http://127.0.0.1:8000/api/books
    $ curl -H 'content-type: application/json' -H 'Accept: application/json' -v -X GET http://127.0.0.1:8000/api/books/:id
    $ curl -H 'content-type: application/json' -H 'Accept: application/json' -v -X POST -d '{"title":"Foo bar","price":"19.99","author":"Foo author","editor":"Foo editor"}' http://127.0.0.1:8000/api/books
    $ curl -H 'content-type: application/json' -H 'Accept: application/json' -v -X PUT -d '{"title":"Foo bar","price":"19.99","author":"Foo author","editor":"Foo editor"}' http://127.0.0.1:8000/api/books/:id
    $ curl -H 'content-type: application/json' -H 'Accept: application/json' -v -X DELETE http://127.0.0.1:8000/api/books/:id
```

## Pagination with Curl

```
    $ curl -H 'content-type: application/json' -H 'Accept: application/json' -v -X GET http://127.0.0.1:8000/api/books?page=:number_page  -H 'Authorization:Basic username:password or email:password'
```

## User Authentication with Curl with middleware auth.basic.username

```
    $ curl -H 'content-type: application/json' -H 'Accept: application/json' -v -X GET http://127.0.0.1:8000/api/books  -H 'Authorization:Basic username:password'
```

## User Authentication with Curl using middleware auth.basic

```
    $ curl -H 'content-type: application/json' -H 'Accept: application/json' -v -X GET http://127.0.0.1:8000/api/books  -H 'Authorization:Basic email:password'
```
