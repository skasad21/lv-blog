<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function posts()
    {
    	return $this->hasMany('App\Post', 'category_id', 'id');
    }

    public function belongtoposts()
    {
        return $this->belongsToMany(Post::class);
    }

    protected $fillable = ['name'];
}
