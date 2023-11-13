<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'content', 'date_posted', 'social_network', 'original_link'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
