<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DailyPostLimit extends Model
{
    use HasFactory;
    protected $table = 'daily_post_limits';
    protected $fillable = [
        'role_id',
        'daily_number_of_post',
    ];

    public function roles($id):string
    {
        $result = DB::select('select * from roles where id = '.$id.'');
        $result = json_decode(json_encode($result), true);
        if (!empty($result['0']['name'])) {
            $result = $result['0']['name'];
        } else {
            $result = "No";
        }
        return $result;
    }
    public function dailyPostPermission($role_id):int
    {
        $result = DB::select('SELECT daily_number_of_post from daily_post_limits where role_id = '.$role_id.'');
        $result = json_decode(json_encode($result), true);
        if (!empty($result['0']['daily_number_of_post'])) {
            $result = $result['0']['daily_number_of_post'];
        } else {
            $result = 0;
        }
        return $result;
    }

}
