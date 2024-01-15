<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newUser = new User();
        $newUser->name = 'Rick';
        $newUser->email = 'rick@mail.com';
        $newUser->nickname = 'rick';
        $newUser->password = Hash::make('password');
        $newUser->save();
    }
}
