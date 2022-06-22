<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function index()
    {
        $roleID = Auth::user()->role_id;
        $postCount = 0;
        if ($roleID == 1) {
            $posts = Post::all();
            $postCount = Post::all()->count();
        }
        if($roleID == 3){
            $posts = Post::whereUserId(Auth::id())->get();
            $postCount = Post::where('user_id', Auth::id())->whereDate('created_at', '=', Carbon::today()->toDateString())->count();
        }

        return view('posts.index', compact('posts','postCount','roleID'));

    }

    public function getPostByUserLoginID()
    {
        $posts = Post::whereUserId(Auth::id())->get();
        return view('posts.index', compact('posts'));
        //return $posts;
    }

    public function create()
    {
        $this->authorize('create', Post::class);
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Post::class);
        $validated = $request->validate([
            'title' => 'required',
            'image' => 'nullable',
            'body' => 'required',
            'user_id' => 'required',
        ]);
        Post::create($validated);

        return to_route('posts.index');
    }

    public function todaysCount(): int
    {
        $count = Post::whereDate('created_at', Carbon::today())->count();
        return $count;
    }
}
