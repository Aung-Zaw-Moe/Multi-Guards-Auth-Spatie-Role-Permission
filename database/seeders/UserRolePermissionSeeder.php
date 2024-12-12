<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Permissions
        Permission::create(['name' => 'role-view', 'guard_name' => 'admin']);
        Permission::create(['name' => 'role-create', 'guard_name' => 'admin']);
        Permission::create(['name' => 'role-update', 'guard_name' => 'admin']);
        Permission::create(['name' => 'role-delete', 'guard_name' => 'admin']);

        Permission::create(['name' => 'permission-view', 'guard_name' => 'admin']);
        Permission::create(['name' => 'permission-create', 'guard_name' => 'admin']);
        Permission::create(['name' => 'permission-update', 'guard_name' => 'admin']);
        Permission::create(['name' => 'permission-delete', 'guard_name' => 'admin']);

        Permission::create(['name' => 'user-view', 'guard_name' => 'admin']);
        Permission::create(['name' => 'user-create', 'guard_name' => 'admin']);
        Permission::create(['name' => 'user-update', 'guard_name' => 'admin']);
        Permission::create(['name' => 'user-delete', 'guard_name' => 'admin']);

        Permission::create(['name' => 'product-view', 'guard_name' => 'admin']);
        Permission::create(['name' => 'product-create', 'guard_name' => 'admin']);
        Permission::create(['name' => 'product-update', 'guard_name' => 'admin']);
        Permission::create(['name' => 'product-delete', 'guard_name' => 'admin']);

        // Create Roles with 'guard_name' set to 'admin'
        $systemRole = Role::create(['name' => 'system', 'guard_name' => 'admin']);
        $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'admin']);
        $depAdminRole = Role::create(['name' => 'depAdmin', 'guard_name' => 'admin']);
        $depUserRole = Role::create(['name' => 'depUser', 'guard_name' => 'admin']);

        // Give all permissions to the roles
        $allPermissionNames = Permission::pluck('name')->toArray();

        $systemRole->givePermissionTo($allPermissionNames);
        $adminRole->givePermissionTo($allPermissionNames);
        $depAdminRole->givePermissionTo($allPermissionNames);
        $depUserRole->givePermissionTo($allPermissionNames);

        // Create the system user (Super Admin) and assign the 'system' role
        $system = Admin::firstOrCreate([
            'email' => 'system@gmail.com',
        ], [
            'name' => 'Super Admin',
            'email' => 'system@gmail.com',
            'password' => Hash::make('password'),
        ]);

        // Assign the 'system' role to the user
        $system->assignRole('system');  // The 'system' role uses the 'admin' guard

        // Create admin user and assign the 'admin' role
        $adminUser = Admin::firstOrCreate([
            'email' => 'admin@gmail.com',
        ], [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $adminUser->assignRole('admin');
    }
}


        // $adminUser = User::firstOrCreate([
        //     'email' => 'admin@gmail.com'
        // ], [
        //     'name' => 'Admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('password'),
        // ]);

        // $adminUser->assignRole($adminRole);


        //     $staffUser = User::firstOrCreate([
        //         'email' => 'staff@gmail.com',
        //     ], [
        //         'name' => 'Staff',
        //         'email' => 'staff@gmail.com',
        //         'password' => Hash::make('password'),
        //     ]);

        //     $staffUser->assignRole($staffRole);


        //     $user = User::firstOrCreate([
        //         'email' => 'user@gmail.com',
        //     ], [
        //         'name' => 'User',
        //         'email' => 'user@gmail.com',
        //         'password' => Hash::make('password'),
        //     ]);

        //     $user->assignRole($userRole);
