<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function getSpecificColumns(array $columns) : Collection
    {
        return self::select($columns)->get();
    }

    public function getRandomVideos(int $count = 10)
    {
        return $this->videos()->inRandomOrder()->limit($count)->get();
    }
}
