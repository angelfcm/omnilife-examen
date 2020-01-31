<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    $usd = rand(6000, 12000);
    $mxn = $usd * 18.89;
    do {
        $code = rand(10000, 99999);
    } while (Employee::whereCode($code)->exists());
    return [
        'code' => $code,
        'name' => $faker->name,
        'salary_usd' => $usd,
        'salary_mxn' => $mxn,
        'address' => $faker->streetAddress,
        'city' => $faker->city,
        'email' => $faker->email,
        'enabled' => true,
    ];
});
