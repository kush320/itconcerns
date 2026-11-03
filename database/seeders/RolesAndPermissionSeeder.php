<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        $permissions = [
            'permission list',
            'permission create',
            'permission edit',
            'permission delete',
            'role list',
            'role create',
            'role edit',
            'role delete',
            'user list',
            'user create',
            'user edit',
            'user delete',
            'slider list',
            'slider create',
            'slider edit',
            'slider delete',
            'page list',
            'page create',
            'page edit',
            'page delete',
            'service list',
            'service create',
            'service edit',
            'service delete',
            'testimonial list',
            'testimonial create',
            'testimonial edit',
            'testimonial delete',
            'resource list',
            'resource create',
            'resource edit',
            'resource delete',
            'teams list',
            'teams create',
            'teams edit',
            'teams delete',
            'faq list',
            'faq create',
            'faq edit',
            'faq delete',
            'client list',
            'client create',
            'client edit',
            'client delete',
            'enquiry list',
            'enquiry delete',
            'quote list',
            'quote delete',
            'customers list',
            'customers create',
            'customers edit',
            'customers delete',
            'microsoft_solutions list',
            'microsoft_solutions create',
            'microsoft_solutions edit',
            'microsoft_solutions delete',
            'google_cloud_solutions list',
            'google_cloud_solutions create',
            'google_cloud_solutions edit',
            'google_cloud_solutions delete',
        ];

        foreach ($permissions as $permission) {
            if (!\Spatie\Permission\Models\Permission::where('name', $permission)->exists()) {
                \Spatie\Permission\Models\Permission::create(['name' => $permission, 'guard_name' => 'web']);
            }
        }


        $this->createRoleIfNotExists('super-admin', $permissions);

 
        $user = \App\Models\User::updateOrCreate(
            ['email' => 'info@itconcerns.com'],
            [
            'name' => 'ITconcerns',
            'password' => bcrypt('password'),
            ]
        );
        
        // Get or create the super-admin role
        $role = Role::where('name', 'super-admin')->first();
        if ($role) {
        $user->assignRole('super-admin');
        }


     

    }

    /**
     * Create a role if it does not exist.
     *
     * @param string $roleName
     * @param array $permissions
     * @return void
     */
    private function createRoleIfNotExists($roleName, $permissions)
    {
        if (!Role::where('name', $roleName)->exists()) {
            $role = Role::create(['name' => $roleName, 'guard_name' => 'web']);
            $role->givePermissionTo($permissions);
        }
    }
}
