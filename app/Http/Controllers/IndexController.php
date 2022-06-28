<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $category_lists = Category::all();
        return view('index', compact('posts','last_posts','category_lists'));
    }

    public function show($post){
        $post =  Post::findOrFail($post);
        $last_posts = Post::limit(4)->orderBy("id","desc")->get();
        return view('show',compact('post','last_posts')); // ['contact' => $contact]
    }

    public function showcategorywise($post){
        // $post =  Post::findOrFail($post);
        // $last_posts = Post::limit(4)->orderBy("id","desc")->get();
        $postCategoryWises = Post::where("posts.category_id", "=", $post)->get();
        $last_posts = Post::limit(4)->orderBy("id","desc")->get();
        $category_lists = Category::all();

        //dd($postCategoryWise);
        return view('showcategorywise',compact('postCategoryWises','last_posts','category_lists')); // ['contact' => $contact]
    }


}
