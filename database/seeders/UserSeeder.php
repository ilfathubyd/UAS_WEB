<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\App;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Aldi',
                'email' => 'admin1@gmail.com',
                'level' => 'Admin',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Kang Operator',
                'email' => 'operator1@gmail.com',
                'level' => 'Operator',
                'password' => bcrypt('123456')
            ]
        ];

        foreach($userData as $key=> $val){
            User::create($val);
        }
    }
}
