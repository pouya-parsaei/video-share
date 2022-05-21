<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class VideoFactory extends Factory
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
            'path' => Storage::path('videos/6Jz9jItLjU8sZUmjQekUkssoJ5RIUy5UQeidhHJj.mp4'),
            'length' => $this->faker->randomNumber(3),
            'slug' => $persianFaker->slug(),
            'description' => $persianFaker->realText(),
            'thumbnail' => 'https://loremflickr.com/320/240?random=' . rand(1,99),
            'category_id' => Category::all()->random(),
            'user_id' => User::first() ?? User::factory()
        ];
    }
}
