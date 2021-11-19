<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Fornecedor;
use Faker\Generator as Faker;
use Faker\Provider\Internet;

$factory->define(Fornecedor::class, function (Faker $faker) {
    return [
        'nome' => $faker->unique()->company(),
        'site' => $faker->unique()->domainName(),
        'uf' => 'AM',
        'email' => $faker->unique()->companyEmail()
    ];
});
