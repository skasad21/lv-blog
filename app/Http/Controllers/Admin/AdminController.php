<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){
        $postCount = Post::all()->count();
        $todayCount = Post::whereDate('created_at', Carbon::today())->count();
        $usersCount = User::all()->count();
        return view('admin.index', compact('postCount','todayCount','usersCount'));
        //return view('admin.index');
    }

    // public function postCount()
    // {
    //     $postCount = Post::all()->count();
    //     return view('admin.index', compact('postCount'));
    // }

    // public function todaysCount()
    // {
    //     $todayCount = Post::whereDate('created_at', Carbon::today())->count();
    //     return view('admin.index', compact('todayCount'));
    // }
}
