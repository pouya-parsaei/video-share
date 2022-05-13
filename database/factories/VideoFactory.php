<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'url' => 'https://yaranbaloot.ir/posts/1/video_url_WhatsApp Video 2022-04-05 at 11.47.45 PM.mp4',
            'length' => $this->faker->randomNumber(3),
            'slug' => $persianFaker->slug(),
            'description' => $persianFaker->realText(),
            'thumbnail' => 'https://loremflickr.com/320/240?random=' . rand(1,99),
            'category_id' => Category::first() ?? Category::factory()
        ];
    }
}
