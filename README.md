# Laravel Api Rest

[![Build Status](https://travis-ci.org/Tony133/LaravelApiRest.svg?branch=master)](https://travis-ci.org/Tony133/LaravelApiRest)

Simple example of a REST API with Laravel 6.0 LTS

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

## Getting with Curl 

```
    $ curl -H 'content-type: application/json' -v -X GET http://127.0.0.1:8000/api/books 
    $ curl -H 'content-type: application/json' -v -X GET http://127.0.0.1:8000/api/books/:id
    $ curl -H 'content-type: application/json' -v -X POST -d '{"title":"Foo bar","price":"19.99","author":"Foo author","editor":"Foo editor"}' http://127.0.0.1:8000/api/books 
    $ curl -H 'content-type: application/json' -v -X PUT -d '{"title":"Foo bar","price":"19.99","author":"Foo author","editor":"Foo editor"}' http://127.0.0.1:8000/api/books/:id
    $ curl -H 'content-type: application/json' -v -X DELETE http://127.0.0.1:8000/api/books/:id
```

## Pagination with Curl

```
    $ curl -H 'content-type: application/json' -v -X GET http://127.0.0.1:8000/api/books?page=:number_page  -H 'Authorization:Basic username:password or email:password'
```

## User Authentication with Curl 

```
    $ curl -H 'content-type: application/json' -v -X GET http://127.0.0.1:8000/api/books  -H 'Authorization:Basic username:password or email:password' 
```
