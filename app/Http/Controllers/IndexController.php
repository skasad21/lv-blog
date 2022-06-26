<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(2);

        $last_posts = Post::limit(4)->orderBy("id","desc")->get();
        //$last_posts = DB::select('select * from posts ORDER BY id DESC LIMIT 3');


        return view('index', compact('posts','last_posts'));
    }
}
