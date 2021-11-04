<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            // User
            [
                'id'    => 1,
                'title' => 'user_index',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 2,
                'title' => 'user_add',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 3,
                'title' => 'user_edit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 4,
                'title' => 'user_delete',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Role
            [
                'id'    => 5,
                'title' => 'role_index',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 6,
                'title' => 'role_add',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 7,
                'title' => 'role_edit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 8,
                'title' => 'role_delete',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Permission
            [
                'id'    => 9,
                'title' => 'permission_index',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 10,
                'title' => 'permission_add',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 11,
                'title' => 'permission_edit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 12,
                'title' => 'permission_delete',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //Task
            [
                'id'    => 13,
                'title' => 'task_index',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 14,
                'title' => 'task_add',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 15,
                'title' => 'task_edit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 16,
                'title' => 'task_delete',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Permission::insert($permissions);
    }
}
