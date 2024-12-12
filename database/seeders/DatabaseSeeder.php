<?php

namespace Database\Seeders;



// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\Admin::factory(2)->create();

        // \App\Models\Admin::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'admin@gmail.com',
        // ]);
        // \App\Models\Admin::factory()->create([
        //     'name' => 'Super Admin',
        //     'email' => 'superadmin@gmail.com',
        // ]);
        // \App\Models\Seller::factory()->create([
        //     'name' => 'Seller',
        //     'email' => 'seller@gmail.com',
        // ]);
        $this->call([
            UserRolePermissionSeeder::class,
        ]);
    }
}
