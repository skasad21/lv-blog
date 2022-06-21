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

        $role = new Role();
        $result = $role->hasPermission('admin');

        if ($result == true) {
            $posts = Post::all();
        } else {
            $posts = Post::whereUserId(Auth::id())->get();
        }
        //whereDate('created_at', '=', Carbon::today()->toDateString());




        return view('posts.index', compact('posts'));
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
