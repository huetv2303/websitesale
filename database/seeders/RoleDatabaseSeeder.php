<?php

namespace Database\Seeders;

use App\Models\Permisson;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
           ['name' => 'super-admin',
            'display_name' => 'Super Admin',
            'group' => 'system'],

            ['name' => 'admin',
                'display_name' => 'Admin',
                'group' => 'system'],

            ['name' => 'employee',
                'display_name' => 'employee',
                'group' => 'system'],

            ['name' => 'manager',
                'display_name' => 'manager',
                'group' => 'system'],

            ['name' => 'user',
                'display_name' => 'user',
                'group' => 'system'],
        ];

        foreach($roles as $role) {
            Role::updateOrCreate($role);
        }

        $permissions = [
            ['name' => 'create-user', 'display_name' => 'Create User', 'group' => 'User'],
            ['name' => 'update-user', 'display_name' => 'Update User', 'group' => 'User'],
            ['name' => 'show-user', 'display_name' => 'Show User', 'group' => 'User'],
            ['name' => 'delete-user', 'display_name' => 'Delete User', 'group' => 'User'],

            ['name' => 'create-role', 'display_name' => 'Create Role', 'group' => 'Role'],
            ['name' => 'update-role', 'display_name' => 'Update Role', 'group' => 'Role'],
            ['name' => 'show-role', 'display_name' => 'Show Role', 'group' => 'Role'],
            ['name' => 'delete-role', 'display_name' => 'Delete Role', 'group' => 'Role'],

            ['name' => 'create-category', 'display_name' => 'Create Category', 'group' => 'Category'],
            ['name' => 'update-category', 'display_name' => 'Update Category', 'group' => 'Category'],
            ['name' => 'show-category', 'display_name' => 'Show Category', 'group' => 'Category'],
            ['name' => 'delete-category', 'display_name' => 'Delete Category', 'group' => 'Category'],

            ['name' => 'create-product', 'display_name' => 'Create product', 'group' => 'product'],
            ['name' => 'update-product', 'display_name' => 'Update product', 'group' => 'product'],
            ['name' => 'show-product', 'display_name' => 'Show product', 'group' => 'product'],
            ['name' => 'delete-product', 'display_name' => 'Delete product', 'group' => 'product'],

            ['name' => 'create-coupon', 'display_name' => 'Create coupon', 'group' => 'coupon'],
            ['name' => 'update-coupon', 'display_name' => 'Update coupon', 'group' => 'coupon'],
            ['name' => 'show-coupon', 'display_name' => 'Show coupon', 'group' => 'coupon'],
            ['name' => 'delete-coupon', 'display_name' => 'Delete coupon', 'group' => 'coupon'],
        ];

        foreach($permissions as $permission) {
            Permisson::UpdateOrCreate($permission);
        }

    }
}
