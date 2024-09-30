<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permission = [ //variabel untuk mengubah data perubahan content di FE
            'manage statistics', 
            'manage products', 
            'manage principles', 
            'manage testimonials', 
            'manage clients', 
            'manage teams', 
            'manage abouts', 
            'manage appointments', 
            'manage hero sections', 
        ];

        foreach($permission as $permission) {
            Permission::firstOrCreate([
                    'name' => $permission
                ]);
        }

        $designManagerRole = Role::firstOrCreate([ //variabel untuk menyimpan permission
            'name' => 'designer_manager'
        ]);

        $designManagerPermission = [
            'manage products', 
            'manage principles', 
            'manage testimonials',
        ];
        $designManagerRole->syncPermissions($designManagerPermission); //syncPermissions()

        $superAdminRole = Role::firstOrCreate(
            [
                'name' => 'super_admin'
            ]
            );

        $user = User::create([
            'name' =>'ProfileCompany',
            'email' => 'super@admin.com',
            'password' => bcrypt('123123123')
        ]);

        $user->assignRole($superAdminRole); //Assign role ke user

    }
}
