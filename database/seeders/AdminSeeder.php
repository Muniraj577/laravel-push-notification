<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Muniraj Rajbanshi',
            'email' => 'admin@muniraj.com',
            'password' => Hash::make('muniraj@123'),
            'active' => 1,
            'avatar' => 'default.png',
            'phone' => '9810450653',
            'remember_token' => Str::random(10),
        ]);
    }
}
