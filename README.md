# Laravel Api Rest
Simple example of a REST API with Laravel 5.3

## Install with Composer

```
    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar install
```

## Getting with Curl 

```
    $ curl -H 'content-type: application/json' -v -X GET http://localhost:8000/api/books 
    $ curl -H 'content-type: application/json' -v -X GET http://localhost:8000/api/books/:id
    $ curl -H 'content-type: application/json' -v -X POST -d '{"name":"Foo bar","price":"19.99","author":"Foo author","editor":"Foo editor"}' http://localhost:8000/api/books 
    $ curl -H 'content-type: application/json' -v -X PUT -d '{"name":"Foo bar","price":"19.99","author":"Foo author","editor":"Foo editor"}' http://localhost:8000/api/books/:id
    $ curl -H 'content-type: application/json' -v -X DELETE http://localhost:8000/api/books/:id
```

## User Authentication with Curl 

```
    $ curl -H 'content-type: application/json' -v -X GET http://localhost:8000/api/books  -H 'Authorization:Basic username:password or email:password' 
```
