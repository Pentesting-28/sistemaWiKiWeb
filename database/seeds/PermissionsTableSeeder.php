<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Users
        Permission::create([
            'name'          => 'Navegar usuarios',
            'slug'          => 'users.index',
            'description'   => 'Lista y navega todos los usuarios del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de usuario',
            'slug'          => 'users.show',
            'description'   => 'Ver en detalle cada usuario del sistema',            
        ]);

        Permission::create([
            'name'          => 'Creación de usuarios',
            'slug'          => 'users.create',
            'description'   => 'Podría crear nuevos usuarios en el sistema',            
        ]);

        Permission::create([
            'name'          => 'Edición de usuarios',
            'slug'          => 'users.edit',
            'description'   => 'Podría editar cualquier dato de un usuario del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar usuario',
            'slug'          => 'users.destroy',
            'description'   => 'Podría eliminar cualquier usuario del sistema',      
        ]);



        //Roles
        Permission::create([
            'name'          => 'Navegar roles',
            'slug'          => 'roles.index',
            'description'   => 'Lista y navega todos los roles del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de un rol',
            'slug'          => 'roles.show',
            'description'   => 'Ver en detalle cada rol del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de roles',
            'slug'          => 'roles.create',
            'description'   => 'Podría crear nuevos roles en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de roles',
            'slug'          => 'roles.edit',
            'description'   => 'Podría editar cualquier dato de un rol del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar roles',
            'slug'          => 'roles.destroy',
            'description'   => 'Podría eliminar cualquier rol del sistema',      
        ]);



        //Manuales
        Permission::create([
            'name'          => 'Navegar manuales',
            'slug'          => 'manuales.index',
            'description'   => 'Lista y navega todos los manuales del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de un manual',
            'slug'          => 'manuales.show',
            'description'   => 'Ver en detalle cada manual del sistema',            
        ]);
        
        Permission::create([
            'name'          => 'Creación de manuales',
            'slug'          => 'manuales.create',
            'description'   => 'Podría crear nuevos manuales en el sistema',
        ]);
        
        Permission::create([
            'name'          => 'Edición de mauales',
            'slug'          => 'manuales.edit',
            'description'   => 'Podría editar cualquier dato de un manual del sistema',
        ]);
        
        Permission::create([
            'name'          => 'Eliminar manual',
            'slug'          => 'manuales.destroy',
            'description'   => 'Podría eliminar cualquier manual del sistema',      
        ]);
    }
}
