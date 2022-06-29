<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\DailyPostLimit;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DailyPostLimitController extends Controller
{
    public function index()
    {
        $DailyPostLimits = DailyPostLimit::whereNotIn('role_id', ['1'])->orderBy('id')->get();
        //$DailyPostLimits = DailyPostLimit::get();
        return view('admin.dailypostlimits.index', compact('DailyPostLimits'));
    }


    public function create()
    {
        $roles = Role::whereNotIn('name', ['admin'])->orderBy('id')->get();
        //$users = User::all()->except(Auth::id());
        return view('admin.dailypostlimits.create', compact('roles'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'role_id' => 'required',
            'daily_number_of_post' => 'required|numeric|digits_between:1,100',
        ]);
        //dd($validated);
        DailyPostLimit::create([
            'role_id' => $request->role_id,
            'daily_number_of_post' => $request->daily_number_of_post,
        ]);

        return to_route('admin.dailypostlimits.index')->with('message', 'Daily Limit Added.');
    }

}
