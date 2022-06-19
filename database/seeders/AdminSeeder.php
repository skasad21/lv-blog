<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create(['name'=>'admin']);
        $premiumUserRole = Role::create(['name'=>'premiumUser']);
        $userRole = Role::create(['name'=>'user']);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'email_verified_at' => now(),
            'role_id' => $adminRole->id
        ]);
    }
}
