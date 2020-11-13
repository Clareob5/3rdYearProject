<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role_admin = Role::where('name', 'admin')->first();
        $role_user = Role::where('name', 'user')->first();

        $admin = new User();
        $admin->name = 'Viv Bir';
        $admin->dob = '1993-02-22';
      //  $admin->dob = '22-02-1993';
        $admin->email = 'admin@reelsandmeals.ie';
        $admin->password = Hash::make('secret1234');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Ted Bo';
        $user->dob = '2000-04-05';
      //  $user->dob = '05-04-2000';
        $user->email = 'user@reelsandmeals.ie';
        $user->password = Hash::make('secret1234');
        $user->save();
        $user->roles()->attach($role_user);

    }
}
