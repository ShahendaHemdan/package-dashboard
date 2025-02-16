<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User; // Import the User model

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create roles
        $superAdminRole = Role::create(['name' => 'super-admin']);
        $userRole = Role::create(['name' => 'user']);

        // Define permissions
        $permissions = [
            // Role Permissions
            ['name' => 'viewAnyRole', 'guard_name' => 'web'],
            ['name' => 'viewRole', 'guard_name' => 'web'],
            ['name' => 'updateRole', 'guard_name' => 'web'],
            ['name' => 'createRole', 'guard_name' => 'web'],
            ['name' => 'deleteRole', 'guard_name' => 'web'],
            ['name' => 'destroyRole', 'guard_name' => 'web'],

            // Permission Permissions
            ['name' => 'viewAnyPermission', 'guard_name' => 'web'],
            ['name' => 'viewPermission', 'guard_name' => 'web'],
            ['name' => 'updatePermission', 'guard_name' => 'web'],
            ['name' => 'createPermission', 'guard_name' => 'web'],
            ['name' => 'deletePermission', 'guard_name' => 'web'],
            ['name' => 'destroyPermission', 'guard_name' => 'web'],

            // User Permissions
            ['name' => 'viewAnyUser', 'guard_name' => 'web'],
            ['name' => 'viewUser', 'guard_name' => 'web'],
            ['name' => 'updateUser', 'guard_name' => 'web'],
            ['name' => 'createUser', 'guard_name' => 'web'],
            ['name' => 'deleteUser', 'guard_name' => 'web'],

            // Course Permissions
            ['name' => 'viewAnyCourse', 'guard_name' => 'web'],
            ['name' => 'viewCourse', 'guard_name' => 'web'],
            ['name' => 'createCourse', 'guard_name' => 'web'],
            ['name' => 'updateCourse', 'guard_name' => 'web'],
            ['name' => 'deleteCourse', 'guard_name' => 'web'],
            ['name' => 'destroyCourse', 'guard_name' => 'web'],
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        // Assign all permissions to the super-admin role
        $superAdminRole->givePermissionTo(Permission::all());

        // Assign specific permissions to the user role
        $userRole->givePermissionTo([
            'viewAnyUser',
            'viewUser',
            'viewAnyCourse',
            'viewCourse',
        ]);

        // Create a super-admin user
        $superAdminUser = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'mobile' => '1234567890',
            'password' => bcrypt('password'),
            'role'=>'super-admin',
            'role_id'=>1,

        ]);

        // Assign the super-admin role to the user
        $superAdminUser->assignRole('super-admin');

        // Create a regular user
        $regularUser = User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'mobile' => '1234567890',
            'password' => bcrypt('password'),
            'role_id'=>2,

        ]);

        // Assign the user role to the regular user
        $regularUser->assignRole('user');
    }
}