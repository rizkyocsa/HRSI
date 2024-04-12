<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => '101001',
                'password' => Hash::make('12345'),
                'id_role' => 2
            ]
        ];

        foreach($users as $key => $user){
            User::create($user);
        }
    }
}
