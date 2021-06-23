<?php

namespace Database\Factories;



use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Produit;

  $factory->define(Produit::class, function(Faker\Generator $faker){
      return[
          'title' => $faker ->word,
           'quantité' => $faker->numberBetween(1, 999999),
           'location' => $facker->url,
      ];
  });

