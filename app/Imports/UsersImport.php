<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'role_id' => $row[0],
            'name' => $row[1],
            'email' => $row[2],
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => 'nullable',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
