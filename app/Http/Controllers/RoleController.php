<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Caffeinated\Shinobi\Models\Permission;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $roles = Role::paginate(10);
        return view('roles.index', compact('roles'));

    }

    public function busqueda(Request $request){

        $name = $request->name;
        $date = $request->date;

        $roles = Role::where('name','LIKE',"%$name%" )
                     ->where('created_at','LIKE',"%$date%" )
                     ->paginate(10);

        if ($name !== null or $date !== null) {
            
            if(count($roles) > 0){

                toast('Busqueda éxitosa','success');
                return view('roles.index', compact('roles'));

            }
            else{

                toast('No se encontraron registros','warning');
                return view('roles.index', compact('roles'));
            }
        }
        else{

            return view('roles.index', compact('roles'));

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $permissions = Permission::get();
        return view('roles.create', compact('permissions'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        $validator = Validator::make($request->all(),[

            'name'           => 'required|min:5|max:255|unique:roles', 
            'slug'           => 'required|min:5|max:255',
            'descripcion'    => 'required|min:5|max:255'

        ]);

        $role              = new Role;
        $role->name        = $request->name;
        $role->slug        = $request->slug;
        $role->description = $request->descripcion;
        
        $errors      = $validator->errors();
        $nombre      = $errors->first('name');
        $slug        = $errors->first('slug');
        $descripcion = $errors->first('descripcion');

        if ($validator->fails()) {

            alert()->html(

                '<h2>Error</h2>',
                "$nombre"."<br>".
                "$slug"."<br>".
                "$descripcion",
                'error');

            return back(); 
        }

        if($request->all_access && $request->no_access &&  $request->permissions){

            toast('Error al seleccionar dos banderas especiales y a su vez permisos.','error');

            return back();

        }
        elseif($request->all_access && $request->no_access){

            toast('Error al seleccionar dos banderas especiales.','error');

            return back();

        }
        elseif($request->all_access && $request->permissions){

            toast('Error al seleccionar una banderas especiales y a su vez permisos.','error');

            return back();

        }
        elseif($request->no_access && $request->permissions){

            toast('Error al seleccionar una banderas especiales y a su vez permisos.','error');

            return back();

        }
        else{

            if(isset($request->all_access)){

                $true = $request->all_access;
                $role->special = $true;

            }elseif(isset($request->no_access)){

                $true = $request->no_access;
                $role->special = $true;

            }else{

                $role->special = null;

            }
        }

        $role->save();
        $role->permissions()->sync($request->get('permissions'));
        Alert::success('Creado', 'Rol creado con éxito');

        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $detalle = Role::findOrFail($id);
        return view('roles.show', compact('detalle'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $role = Role::findOrFail($id);
        $permissions = Permission::get();

        return view('roles.edit', compact('role', 'permissions'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function update(Request $request, $id)
    {

         $validator = Validator::make($request->all(),[

            'name'           => "required|min:5|max:255|unique:roles,name,$id",
            'slug'           => 'required|min:5|max:255',
            'descripcion'    => 'required|min:5|max:255'

        ]);

        $role              = Role::findOrFail($id);
        $role->name        = $request->name;
        $role->slug        = $request->slug;
        $role->description = $request->descripcion;
        
        $errors      = $validator->errors();
        $nombre      = $errors->first('name');
        $slug        = $errors->first('slug');
        $descripcion = $errors->first('descripcion');

        if ($validator->fails()) {

            alert()->html(

                '<h2>Error</h2>',
                "$nombre"."<br>".
                "$slug"."<br>".
                "$descripcion",
                'error');

            return back(); 
        }

        if($request->all_access && $request->no_access &&  $request->permissions){

            toast('Error al seleccionar dos banderas especiales y a su vez permisos.','error');

            return back();

        }
        elseif($request->all_access && $request->no_access){

            toast('Error al seleccionar dos banderas especiales.','error');

            return back();

        }
        elseif($request->all_access && $request->permissions){

            toast('Error al seleccionar una banderas especiales y a su vez permisos.','error');

            return back();

        }
        elseif($request->no_access && $request->permissions){

            toast('Error al seleccionar una banderas especiales y a su vez permisos.','error');

            return back();

        }
        else{

            if(isset($request->all_access)){

                $true = $request->all_access;
                $role->special = $true;

            }elseif(isset($request->no_access)){

                $true = $request->no_access;
                $role->special = $true;

            }else{

                $role->special = null;

            }
        }

        $role->save();
        $role->permissions()->sync($request->get('permissions'));
        Alert::success('Actualizado', 'Rol actializado con éxito');

        return redirect()->route('roles.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $eliminando=Role::findOrFail($id)->delete();
        Alert::success('Eliminado', 'Rol eliminado con éxito');

        return back();
    }
}
