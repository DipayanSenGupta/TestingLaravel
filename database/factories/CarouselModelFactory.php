<?php

use Faker\Generator as Faker;
// use ;

$factory->define(App\Carousel::class, function (Faker $faker) {
    return [
    	'title' => $faker->word,
    	'link' => $faker->url,
    	'src' => $faker->url,
    ];
});
