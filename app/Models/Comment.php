<?php

namespace App\Models;

use App\Models\Traits\Likeable;
use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory, Likeable;

    protected $fillable = ['user_id','body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function video()
    {
        return $this->belongsTo(Video::class);
    }

    public function getOwnerGravatarAttribute()
    {
        return $this->user->gravatar;
    }

    public function getOwnerNameAttribute()
    {
        return $this->user->name;
    }

    public function getCreatedAtInHumanAttribute()
    {
        return (new Verta($this->created_at))->formatDifference();

    }
}
