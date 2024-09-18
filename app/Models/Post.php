<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory,SoftDeletes,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'image',
        'user_id',
        'category_id',
        'subcategory_id'
    ];

    public function user()  
    {
    return $this->belongsTo(User::class);
    }

    public function category()  
    {
    return $this->belongsTo(Categories::class);
    }

    public function subcategory()  
    {
    return $this->belongsTo(SubCategories::class);
    }

    public function tags()  
    {
    return $this->belongsToMany(Tag::class);
    }

}
