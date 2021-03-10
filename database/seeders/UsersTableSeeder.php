<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::truncate();

        \DB::table('role_user')->truncate();     //this table link the Roles to the User so it needs to be emptied as well

        //get the roles out of the database
        $adminRole = Role::where('name','admin')->first();
        $editorRole = Role::where('name','editor')->first();
        $writerRole = Role::where('name','writer')->first();
        $genericRole = Role::where('name','generic')->first();

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@user.com',
            'password' => Hash::make('password'),
            ]);
        $editor = User::create([
            'name' => 'Editor User',
            'email' => 'editor@user.com',
            'password' => Hash::make('password'),
            ]);
        $writer = User::create([
            'name' => 'Writer User',
            'email' => 'writer@user.com',
            'password' => Hash::make('password'),
            ]);
        $generic = User::create([
            'name' => 'Generic User',
            'email' => 'generic@user.com',
            'password' => Hash::make('password'),
            ]);

        //assigning the roles
        $admin->roles()->attach($adminRole); //attach the admin role to the admin user by the role we define
        $editor->roles()->attach($editorRole);
        $writer->roles()->attach($writerRole);
        $generic->roles()->attach($genericRole);

    }
}
