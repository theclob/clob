<?php

use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Clob\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Clob\Option::class, function(Faker\Generator $faker) {
	return [
		'title' => 'Example Blog',
	];
});

$factory->define(Clob\Post::class, function(Faker\Generator $faker) {
	return [
		'title' => 'An Example Post',
		'subtitle' => 'Examining the simplicities of an example post',
		'markdown_content' => '## A simple example Markdown heading',
	];
});

$factory->state(Clob\Post::class, 'published', function($faker) {
	return [
		'published_at' => Carbon::parse('-1 week'),
	];
});

$factory->state(Clob\Post::class, 'future', function($faker) {
	return [
		'published_at' => Carbon::parse('+1 week'),
	];
});

$factory->state(Clob\Post::class, 'unpublished', function($faker) {
	return [
		'published_at' => null,
	];
});