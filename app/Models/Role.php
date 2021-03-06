<?php

namespace App\Models;


use App\Models\User;
use App\Models\DailyPostLimit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    //protected $table = 'roles';
    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function hasPermission($name): bool
    {
        return $this->permissions()->where('name', $name)->exists();
    }

    // public function DailyPostLimit()
    // {
    //     return $this->belongsTo(DailyPostLimit::class);
    // }

    public function DailyPostLimit()
    {
        return $this->hasOne(DailyPostLimit::class);
    }

}
