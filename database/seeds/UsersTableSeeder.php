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

       $users = User::create([
                'name' => 'Admin',
                'email' => 'admin02@cantv.com.ve',
                'email_verified_at' => now(),
                'password' => bcrypt('123456789'),
                'remember_token' => Str::random(10),

        ]);

        //factory(User::class, 20)->create();

        //Role Admin
        $role_admin          = Role::create([
        	'name'           => 'Administrador',
        	'slug'  	     => 'admin',
        	'special' 	     => 'all-access',
            'description'    => 'Acceso total al sistema'
        ]);

        //Role users
        $role_Users          = Role::create([
            'name'           => 'Usuarios',
            'slug'           => 'usuarios',
            'description'    => 'Acceso total a usuarios'
        ]);

        $role_Users->givePermissionTo('users.show', 'users.create', 'users.edit','users.destroy');

        //Role roles
        $role_Roles         =  Role::create([
            'name'           => 'Roles',
            'slug'           => 'roles',
            'description'    => 'Acceso total a roles'
        ]);

        $role_Roles->givePermissionTo('roles.show', 'roles.create', 'roles.edit','roles.destroy');

        //Role manuals
        $role_Manual         =  Role::create([
            'name'           => 'Manuales',
            'slug'           => 'manuales',
            'description'    => 'Acceso total a manuales'
        ]);

        $role_Manual->givePermissionTo('manuales.show', 'manuales.create', 'manuales.edit','manuales.destroy');

        //Asing role the Admin to user 
        $user = User::find($users->id); //Admin
        $user->roles()->attach($role_admin);
        /*$admin->givePermissionTo(Permission::all());*/

    }
}
