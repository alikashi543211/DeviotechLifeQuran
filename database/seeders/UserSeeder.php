<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::where('role','admin')->count() == 0) {
        
        $user = User::create([
                'name' => 'Admin',
                'email' => 'admin@lifequran.com',
                'email_verified_at' => '2020-08-07 17:00:00',
                'password' => bcrypt('12345678'),
                'role' => 'admin',
                'avatar' => 'default.png',
            ]);


            $role = Role::create(['name' => 'admin']);
            $permission = Permission::create(['name' => 'browse_admin']);

            $role->givePermissionTo($permission);

            $user->assignRole($role);

        }
    }
}
