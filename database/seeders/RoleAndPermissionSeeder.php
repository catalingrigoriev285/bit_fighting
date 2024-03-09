<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employee = Role::create([
            'name' => 'employee',
        ]);

        $organizationAdmin = Role::create([
            'name' => 'organization_admin',
        ]);

        $departamentManager = Role::create([
            'name' => 'departament_manager',
        ]);

        $projectManager = Role::create([
            'name' => 'project_manager',
        ]);
    }
}