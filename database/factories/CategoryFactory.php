<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $persianFaker = \Faker\Factory::create('fa_IR');
        return [
            'name' => $persianFaker->name(),
            'slug' => $persianFaker->slug(),
            'icon' => $persianFaker->word(),
            'description' => $persianFaker->realText()
        ];
    }
}
