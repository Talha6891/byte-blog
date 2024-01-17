<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['admin', 'writer', 'user'];

        foreach ($roles as $role) {

            Role::create([
                'name' => $role,
                'guard_name' => 'web'
            ]);
        }

        // admin
        $admin = Role::where(['name' => 'admin', 'guard_name' => 'web'])->firstOrFail();
        $admin->givePermissionTo(Permission::where('guard_name', 'web')->get());

        // writer
        $writer = Role::where(['name' => 'writer', 'guard_name' => 'web'])->firstOrFail();
        $writer->givePermissionTo([

            // category
            'category index',
            'category create',
            'category update',
            'category delete',
            'category show',

            // post
            'post index',
            'post create',
            'post update',
            'post delete',
            'post show',

            // tag
            'tag index',
            'tag create',
            'tag update',
            'tag delete',
            'tag show',

        ]);

        //user
        $user = Role::where(['name' => 'user', 'guard_name' => 'web'])->firstOrFail();
    }
}
