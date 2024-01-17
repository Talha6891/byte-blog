<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = collect([

            // user
            ['name' => 'user index'],
            ['name' => 'user create'],
            ['name' => 'user update'],
            ['name' => 'user delete'],
            ['name' => 'user show'],

            // roles create
            ['name' => 'role index'],
            ['name' => 'role create'],
            ['name' => 'role update'],
            ['name' => 'role delete'],
            ['name' => 'role show'],

            // categories
            ['name' => 'category index'],
            ['name' => 'category create'],
            ['name' => 'category update'],
            ['name' => 'category delete'],
            ['name' => 'category show'],

            // post
            ['name' => 'post index'],
            ['name' => 'post create'],
            ['name' => 'post update'],
            ['name' => 'post delete'],
            ['name' => 'post show'],

            // tag
            ['name' => 'tag index'],
            ['name' => 'tag create'],
            ['name' => 'tag update'],
            ['name' => 'tag delete'],
            ['name' => 'tag show'],
        ]);

        $web = collect([]);

        $permissions->map(function ($permission) use ($web) {

            $web->push([
                'name' => $permission['name'],
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()

            ]);
        });

        Permission::insert($web->toArray());
    }
}
