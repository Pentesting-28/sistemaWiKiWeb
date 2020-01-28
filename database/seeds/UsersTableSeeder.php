<?php

use Illuminate\Database\Seeder;
use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Support\Str;



class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
                'name' => 'Admin',
                'email' => 'Admin02@cantv.com.ve',
                'email_verified_at' => now(),
                'password' => bcrypt('123456789'),
                'remember_token' => Str::random(10),

        ]);

        //factory(User::class, 20)->create();

        //Admin
        $role_admin          = Role::create([
        	'name'           => 'Admin',
        	'slug'  	     => 'admin',
        	'special' 	     => 'all-access',
            'description'    => 'Super Usuario'
        ]);

        /*$admin->givePermissionTo(Permission::all());*/

        //User Admin
        $user = User::find(1); //Admin
        $user->roles()->attach($role_admin);

    }
}
