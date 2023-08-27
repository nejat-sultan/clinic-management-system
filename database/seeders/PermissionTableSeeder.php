<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'patient-list',
           'patient-create',
           'patient-edit',
           'patient-delete',
           'manage-users',
           'manage-roles',
           'manage-employees',
           'manage-patients',
           'manage-appointments',
           'manage-ordered-labs',
           'manage-patient-appointments',
           'manage-lab-lists',
           'manage-new-regions',
           'manage-employee-types'
        ];
        
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}