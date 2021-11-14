<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'Create courses'
        ]);
        
        Permission::create([
            'name' => 'Read courses'
        ]);
        
        Permission::create([
            'name' => 'Update courses'
        ]);
        
        Permission::create([
            'name' => 'Delete courses'
        ]);
       
        Permission::create([
            'name' => 'See dashboard'
        ]);

        Permission::create([
            'name' => 'Create role'
        ]);

        Permission::create([
            'name' => 'List role'
        ]);
       
        Permission::create([
            'name' => 'Edit role'
        ]);
       
        Permission::create([
            'name' => 'Delete role'
        ]);
       
        Permission::create([
            'name' => 'Read users'
        ]);
       
        Permission::create([
            'name' => 'Edit users'
        ]);

    }
}
