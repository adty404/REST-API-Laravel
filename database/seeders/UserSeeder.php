<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'name'              => 'Aditya Prasetyo',
                'email'             => 'aditya@gmail.com',
                'password'          => bcrypt('password'),
                'email_verified_at' => now(),
            ],

            [
                'name'              => 'Prasetyo',
                'email'             => 'prasetyo@gmail.com',
                'password'          => bcrypt('password'),
                'email_verified_at' => now(),
            ],

            [
                'name'              => 'Lisa',
                'email'             => 'lisa@gmail.com',
                'password'          => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        ])->each(function($user){
            User::create($user);
        });

        // collect(['admin', 'moderator'])->each(fn($role) => \App\Models\Role::create(['name' => $role])); // php 7.4

        collect([
            'admin', 
            'moderator'
        ])->each(function($role) {
            Role::create(['name' => $role]);
        });

        User::find(1)->roles()->attach([1]);
        User::find(2)->roles()->attach([2]);
    }
}
