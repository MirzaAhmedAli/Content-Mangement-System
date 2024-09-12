<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'name'
    ];

    public function posts()  
    {
    return $this->belongsToMany(Post::class);
    }
}
