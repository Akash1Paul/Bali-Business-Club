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
     *
     * @return void
     */
    public function run(): void
    {
        $userArr = [
            'user1' => [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make(12345678),
                'roles' => 1
            ],
        ];

        foreach ($userArr as $user) {
            User::create(
                [
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'password' => $user['password'],
                    'roles' => $user['roles']
                ]
            );
        }
    }
}
