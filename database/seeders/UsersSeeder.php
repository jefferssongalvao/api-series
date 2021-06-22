<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run()
    {
        User::create([
            "name" => "Default User",
            "email" => "user@teste.com",
            "password" => Hash::make("123456")
        ]);
    }
}