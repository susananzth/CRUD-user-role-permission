<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));
        $user_permissions = $admin_permissions->filter(function ($permission) {
            $str = strpos($permission->title, 'index');
            if ($str !== false) {
                return true;
            }else{
                return false;
            }
        });
        Role::findOrFail(2)->permissions()->sync($user_permissions);
    }
}
