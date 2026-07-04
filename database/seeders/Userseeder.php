<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user=User::create([
            'email'=>'admin@gmail.com',
            'name'=>'admin',
            'password'=>Hash::make('admin123'),
        ]);
        $role=Role::where('name','admin')->first();
        $user->roles()->attach($role->id);
    }
}
