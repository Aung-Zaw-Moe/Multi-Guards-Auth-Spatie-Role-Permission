<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin::factory(2)->create();

        // User::create([
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('password'),
        //     'role' => 'admin'
        // ]);
    }
}
