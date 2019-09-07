<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title'  => $faker->sentence,
        'price' => $faker->randomNumber(2),
        'author' => $faker->name,
        'editor'=> $faker->company,
    ];
});
