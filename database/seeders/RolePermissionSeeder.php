<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $arrayOfPermissionNames = [
            'access-dashboard',
            'create-expert-account',
            'create-questions',
            'acc-jawaban',
            'answer-the-question',

        ];
        $permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'web'];
        });

        Permission::insert($permissions->toArray());
        $arrayOfRolesNames = [
            'Super Admin',
            'Expert',
            'User',
        ];
        $roles = collect($arrayOfRolesNames)->map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'web'];
        });

        Role::insert($roles->toArray());
        $permissionsByRole = [
            'Super Admin' => [
                'access-dashboard',
                'create-expert-account',
                'create-questions',
                'acc-jawaban',
                'answer-the-question',
            ],
            'Expert' => [
                'access-dashboard',
                'answer-the-question',
            ],
            'User' => [
                'answer-the-question',
            ],
        ];



        foreach ($permissionsByRole as $role => $permissionIds) {
            $role = Role::whereName($role)->first();
            $role->givePermissionTo($permissionIds);
        }
    }
}
