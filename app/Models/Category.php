<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function posts()
    {
    	return $this->hasMany('App\Post');
    }

    public function belongtoposts()
    {
        return $this->belongsToMany(Post::class);
    }


    protected $fillable = ['name'];
}
