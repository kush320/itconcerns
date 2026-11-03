<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Spatie\Permission\Models\Role;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create or update the admin user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = 'info@itconcerns.com';
        $name = 'ITconcerns';
        $password = 'password';

        // Create or update the user
        $user = User::updateOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'password' => bcrypt($password),
            ]
        );

        // Get or create the super-admin role
        $role = Role::where('name', 'super-admin')->first();
        if ($role) {
            $user->assignRole('super-admin');
            $this->info('User assigned to super-admin role.');
        } else {
            $this->warn('super-admin role not found. Please run the RolesAndPermissionSeeder first.');
        }

        $this->info('Admin user created/updated successfully!');
        $this->line('Email: ' . $email);
        $this->line('Password: ' . $password);

        return 0;
    }
}
