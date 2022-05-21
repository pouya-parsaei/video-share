<?php

namespace App\Models;

use App\Models\Traits\Likeable;
use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory, Likeable;

    protected $fillable = ['name', 'path', 'length', 'slug', 'description', 'thumbnail', 'category_id'];

    protected $perPage = 18;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getLengthInHumanAttribute($length)
    {
        return gmdate('i:s', $length);
    }

    public function getCreatedAtAttribute($createdAt)
    {
        return (new Verta($createdAt))->formatDifference();
    }

    public function getCategoryNameAttribute()
    {
        return $this->category->name;
    }

    public function getRelatedVideos($count = 10)
    {
        return $this->category->getRandomVideos($count)->except($this->id);
    }

    public function getOwnerNameAttribute()
    {
        return $this->user?->name;
    }

    public function getOwnerGravatarAttribute()
    {
        return $this->user->gravatar;

    }

    public function getVideoUrlAttribute()
    {
        return '/storage/'. $this->path;
    }
}
