<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $usuarios = User::orderBy('id', 'ASC')->paginate(10);

        return view('usuarios.index', compact('usuarios'));
        
    }

    public function busqueda(Request $request){

        $name = $request->name;
        $email= $request->email;
        $date = $request->date;

        $usuarios = User::orderBy('id', 'ASC')->where('name','LIKE',"%$name%" )
                                              ->where('email','LIKE',"%$email%" )
                                              ->where('created_at','LIKE',"%$date%" )
                                              ->paginate(10);

        if ($name !== null or $date !== null or $email !== null) {
            
            if(count($usuarios) > 0){

                toast('Busqueda éxitosa','success');
                return view('usuarios.index', compact('usuarios'));

            }
            else{

                toast('No se encontraron registros','warning');
                return view('usuarios.index', compact('usuarios'));
            }
        }
        else{

            return view('usuarios.index', compact('usuarios'));

        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $roles = Role::get();
        return view('usuarios.create',compact('roles'));
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

            'nombre'    => 'required|string|min:5|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:8|confirmed'

        ]);

        $errors      = $validator->errors();
        $nombre      = $errors->first('nombre');
        $email       = $errors->first('email');
        $password    = $errors->first('password');

        if ($validator->fails()) {

            alert()->html(

                '<h2>Error</h2>',
                "$nombre"."<br>".
                "$email"."<br>".
                "$password",
                'error');

            return back(); 
        }

        $register_users                    = new User();
        
        $register_users->name              = $request->nombre;  
        $register_users->email             = $request->email;
        $register_users->email_verified_at = now();
        $register_users->password          = Hash::make($request->password);
        $register_users->remember_token    = Str::random(10);
        $register_users->save();

        if($request->roles > 0){
      
            if(count($request->roles) > 1){

                toast('Error al asignar más de un rol.','error');

                return back();
            }
            else{

                $register_users->roles()->sync($request->get('roles'));
                    
            }
        }

        
        Alert::success('Creado', 'Usuario creado con éxito');

        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    	$detalle= User::findOrFail($id);
        return view('usuarios.show',compact('detalle'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $editar= User::findOrFail($id);
        $roles = Role::get();

        return view('usuarios.edit',compact('editar','roles'));

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

            'nombre' => 'required|string|min:5|max:255',
            'email' =>  "required|string|email|max:255|unique:users,email,$id"

        ]);

        $errors      = $validator->errors();
        $nombre      = $errors->first('nombre');
        $email       = $errors->first('email');

        if ($validator->fails()) {

            alert()->html(

                '<h2>Error</h2>',
                "$nombre"."<br>".
                "$email",
                'error');

            return back(); 
        }

        $user          = User::findOrFail($id);
        $user->name    =  $request->nombre;
        $user->email   =  $request->email;
      
      if($request->roles > 0){

            if(count($request->roles) > 1){

                toast('Error al asignar más de un rol.','error');

                return back();
            }
            else{

                $user->roles()->sync($request->get('roles'));
                
            }
      }
      else{

          $rol = $user->roles;
          $user->removeRoles($rol);

        }

        $user->save();
        Alert::success('Actualizado', 'Usuario actualizado con éxito');

        return redirect()->route('users.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $eliminando=User::findOrFail($id)->delete();
        Alert::success('Eliminado', 'Usuario eliminado con éxito');

        return back();
                         
    }
}
