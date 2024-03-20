<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Roles
         $roles = [
            'organization_admin',
            'department_manager',
            'project_manager',
            'employee',
            'team_lead',
            'technical_lead',
            'scrum_master',
            'frontend_developer',
            'backend_developer',
            'qa_engineer',
            'ux_designer',
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        // Permissions
        $permissions = [
            'create_organization',
            'update_organization',
            'delete_organization',
            'view_organization',
            'create_department',
            'update_department',
            'delete_department',
            'view_department',
            'create_project',
            'update_project',
            'delete_project',
            'view_project',
            'create_task',
            'update_task',
            'delete_task',
            'view_task',
            'create_team',
            'update_team',
            'delete_team',
            'view_team',
            'create_user',
            'update_user',
            'delete_user',
            'view_user',
            'create_role',
            'update_role',
            'delete_role',
            'view_role',
            'create_permission',
            'update_permission',
            'delete_permission',
            'view_permission',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Assign permissions to roles
        $rolePermissions = [
            'organization_admin' => [
                'create_organization',
                'update_organization',
                'delete_organization',
                'view_organization',
                'create_department',
                'update_department',
                'delete_department',
                'view_department',
                'create_project',
                'update_project',
                'delete_project',
                'view_project',
                'create_task',
                'update_task',
                'delete_task',
                'view_task',
                'create_team',
                'update_team',
                'delete_team',
                'view_team',
                'create_user',
                'update_user',
                'delete_user',
                'view_user',
                'create_role',
                'update_role',
                'delete_role',
                'view_role',
                'create_permission',
                'update_permission',
                'delete_permission',
                'view_permission',
            ],
            
            'employee' => [
                'create_task',
                'update_task',
                'delete_task',
                'view_task',
                'create_team',
                'update_team',
                'delete_team',
                'view_team',
                'create_user',
                'update_user',
                'delete_user',
                'view_user',
            ],
        ];
    }
}
