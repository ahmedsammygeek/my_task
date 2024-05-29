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
        $permissions = [
            'show users' , 
            'list users' , 
            'delete users' , 
            'create admins' , 
            'update admins' , 
            'list admins' , 
            'show admins' , 
            'delete admins' , 
            'create areas' , 
            'update areas' , 
            'list areas' , 
            'show areas' , 
            'delete areas' , 
            'create rooms' , 
            'update rooms' , 
            'list rooms' , 
            'show rooms' , 
            'delete rooms' , 
            'update rooms reservations' , 
            'delete rooms reservations' , 
        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission ]);
        }



    }
}
