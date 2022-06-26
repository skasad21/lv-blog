<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Requests\UserUpdateRequest;


class PostController extends Controller
{
    public function index()
    {
        $roleID = Auth::user()->role_id;
        $postCount = 0;
        if ($roleID == 1) {
            $posts = Post::paginate(5);

            //$posts = Post::paginate(8);
            $postCount = Post::all()->count();
        }
        if ($roleID == 3) {
            // $posts = Post::whereUserId(Auth::id())->get()->paginate(5);
            $posts = Post::where('user_id', Auth::id())->paginate(5);
            $postCount = Post::where('user_id', Auth::id())->whereDate('created_at', '=', Carbon::today()->toDateString())->count();
        }

        return view('posts.index', compact('posts', 'postCount', 'roleID'));
    }

    public function show($id){
        $post =  Post::findOrFail($id);
        return view('posts.show',compact('post')); // ['contact' => $contact]
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(PostUpdateRequest $request, Post $post)
    {
        $post->update($request->validated());

        return to_route('posts.index')->with('message', 'Post updated.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('posts.index')->with('message', 'Post deleted.');
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
        // $this->authorize('create', Post::class);
        // $validated = $request->validate([
        //     'title' => 'required',
        //     'image' => 'nullable',
        //     'body' => 'required',
        //     'user_id' => 'required',
        // ]);
        // Post::create($validated);

        // return to_route('posts.index')->with('message', 'Post Recorded');

        $request->validate([
            'title' => 'required|min:3|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'body' => 'required|min:10|max:4096',
            'user_id' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $imageDestinationPath = 'uploads/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $input['image'] = "$postImage";
        }
        Post::create($input);

        return redirect()->route('posts.index')->with('message','Post created successfully.');


    }

    public function todaysCount(): int
    {
        $count = Post::whereDate('created_at', Carbon::today())->count();
        return $count;
    }
}
