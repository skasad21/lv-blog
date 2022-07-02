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
        //$DailyPostLimits = DailyPostLimit::whereNotIn('role_id', ['1'])->orderBy('id')->get();
        //$DailyPostLimits = DailyPostLimit::get();
        return view('admin.dailypostlimits.index');
    }

    public function fetchDailyPost()
    {
        // $DailyPostLimits = DailyPostLimit::whereNotIn('role_id', ['1'])->orderBy('id')->get();
        $DailyPostLimits = DB::table("daily_post_limits as dpl")
            ->join("roles as rol", function ($join) {
                $join->on("dpl.role_id", "=", "rol.id")
                    ->where("rol.id", "!=", 1);
            })
            ->select("dpl.id", "rol.name", "dpl.daily_number_of_post")
            ->get();
        return response()->json([
            'DailyPostLimits' => $DailyPostLimits,
        ]);
    }

    public function roles()
    {
        $result = DB::select('select * from roles WHERE roles.id != 1');

        return response()->json([
            'roles' => $result,
        ]);

        // $result = json_decode(json_encode($result), true);
        // if (!empty($result['0']['name'])) {
        //     $result = $result['0']['name'];
        // } else {
        //     $result = "No";
        // }
        // return $result;
    }


    public function create()
    {
        $roles = Role::whereNotIn('name', ['admin'])->orderBy('id')->get();
        //$users = User::all()->except(Auth::id());
        return view('admin.dailypostlimits.create', compact('roles'));
    }

    // public function store(Request $request)
    // {

    //     $validated = $request->validate([
    //         'role_id' => 'required',
    //         'daily_number_of_post' => 'required|numeric|digits_between:1,100',
    //     ]);
    //     //dd($validated);
    //     DailyPostLimit::create([
    //         'role_id' => $request->role_id,
    //         'daily_number_of_post' => $request->daily_number_of_post,
    //     ]);

    //     return to_route('admin.dailypostlimits.index')->with('message', 'Daily Limit Added.');
    // }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role_id' => 'required',
            'daily_number_of_post' => 'required|numeric|digits_between:1,100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator,
            ]);
        } else {
            $student = new DailyPostLimit;
            $student->role_id = $request->input('role_id');
            $student->daily_number_of_post = $request->input('daily_number_of_post');

            $student->save();
            return response()->json([
                'status' => 200,
                'message' => 'Daily Post Limit Successfully Added.'
            ]);
        }
    }


    public function edit($id)
    {
        $dailypostlimit = DailyPostLimit::find($id);
        if ($dailypostlimit) {
            return response()->json([
                'status' => 200,
                'dailypostlimit' => $dailypostlimit,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Post Limit Found.'
            ]);
        }
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'role_id' => 'required',
            'daily_number_of_post' => 'required|numeric|digits_between:1,100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator,
            ]);
        } else {
            $student = DailyPostLimit::find($id);
            if ($student) {
                $student->role_id = $request->input('role_id');
                $student->daily_number_of_post = $request->input('daily_number_of_post');
                $student->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'Daily Number of Post Updated Successfully.'
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'No Daily Number of Post Found.'
                ]);
            }
        }
    }




    public function destroy($id)
    {
        $student = DailyPostLimit::find($id);
        if($student)
        {
            $student->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Limit Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Daily Limit Found.'
            ]);
        }
    }



}
