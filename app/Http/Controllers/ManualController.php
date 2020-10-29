<?php
namespace App\Http\Controllers;
use App\Imagen;
use App\Manual;
use App\Subtitle_manual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;


class ManualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manuales = Manual::orderBy('id', 'ASC')->paginate(10); 

        return view('Manuales.index',compact('manuales'));
        
    }

    public function busqueda(Request $request){

        $name  = $request->name;
        $date  = $request->date;
        $email = $request->email;
        
        $manuales = Manual::orderBy('id', 'ASC')->where('name','LIKE',"%$name%" )
                                                ->where('created_at','LIKE',"%$date%" )
                                                ->where('author', 'LIKE',"%$email%")
                                                ->paginate(10);

        if ($name !== null or $date !== null) {
            
            if(count($manuales) > 0){

                toast('Busqueda éxitosa','success');
                return view('Manuales.index',compact('manuales'));

            }
            else{

                toast('No se encontraron registros','warning');
                return view('Manuales.index',compact('manuales'));
            }
        }
        else{

            return view('Manuales.index',compact('manuales'));

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('Manuales.create');
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

            'titulo'           => 'required|min:5|max:255',
            'descripcion'      => 'required|min:5|max:600'

        ]);

         $errors      = $validator->errors();
            
         $titulo      = $errors->first('titulo');
         $descripcion = $errors->first('descripcion');

        if ($validator->fails()) {

            alert()->html(

                '<h2>Error</h2>',
                "$titulo"."<br>".
                "$descripcion",
                'error');

            return back(); 
        }
            
            $manual               = new Manual();
            $manual->name         = $request->titulo;
            $manual->description  = $request->descripcion;
            $manual->author       = $request->author;
            $manual->save();
          
        if($request->Subtitulo && $request->Contenido){
            
        $validator = Validator::make($request->all(),[

            'Subtitulo.*' => 'required_unless:type_of_content,is_information|min:5|max:255', 
            //'required|array|max:255',
            'Contenido.*' => 'required_unless:type_of_content,is_information|min:5|max:600'
            //'required|array|max:600'
        ]);

            $errors = $validator->errors();
            
            $contenido = $errors->first('Contenido.*');
            $subtitulo = $errors->first('Subtitulo.*');
             
            $contenido = str_replace(".0", " ", $contenido);
            $subtitulo = str_replace(".0", " ", $subtitulo);

            if ($validator->fails()) {

                alert()->html(

                    '<h2>Error</h2>',
                    "$subtitulo"."<br>".
                    "$contenido",
                    'error');

                return back(); 
            }
            
            //La funcion o propiedad de php count() define el tamaño de un array
            for($i = 0 ; $i < count($request->Contenido); $i++){
      
                    $subtitle=$request->Contenido;

                if (isset($subtitle[$i]) ? $subtitle[$i] : '') {

                    $subtitle_manual                       = new Subtitle_manual();
                    $subtitle_manual->manual_id            = $manual->id;
                    $subtitle_manual->subtitle_name        = $request->Subtitulo[$i];
                    $subtitle_manual->subtitle_description = $request->Contenido[$i];
                    $subtitle_manual->save();

                        $img=$request->imagen;

                    if (isset($img[$i]) ? $img[$i] : '') {


                        $nombre_archivo = uniqid().$img[$i]->getClientOriginalName();
                        $path = $request->imagen[$i]->storeAs('reporte', $nombre_archivo,'public');

                        $imagen                     = new Imagen();
                        $imagen->subtitle_manual_id = $subtitle_manual->id;
                        $imagen->ruta               = $path;
                        $imagen->save();

                    }
                }
            } 
        }

        Alert::success('Creado', 'Manual creado con éxito');
        return redirect()->route('manuales.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Manual  $manual
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
           $manuals = Manual::where('id',$id)
           ->with(['subtitle' => function ($query) {
                $query->orderBy('id', 'asc')->with('imagen');
            }])->get();

           return view('Manuales.show',compact('manuals'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Manual  $manual
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            //$edit_manuals = Manual::findOrFail($manual);
            //$edit_manuals = Manual::where('id',$manual)->with('subtitle','subtitle.imagen')->get();
            $edit_manuals = Manual::where('id',$id)
           ->with(['subtitle' => function ($query) {
                $query->orderBy('id', 'asc')->with('imagen');
            }])->get();

            return View('Manuales.edit',compact('edit_manuals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manual  $manual
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(),[

            'titulo'           => 'required|min:5|max:255',
            'descripcion'      => 'required|min:5|max:600'

        ]);

         $errors      = $validator->errors();
            
         $titulo      = $errors->first('titulo');
         $descripcion = $errors->first('descripcion');
             
        if ($validator->fails()) {

            alert()->html(

                '<h2>Error</h2>',
                "$titulo"."<br>".
                "$descripcion",
                'error');

            return back(); 
        }

          $manual = Manual::findOrFail($id);
          $manual->name                         = $request->titulo;
          $manual->description                  = $request->descripcion;
          $manual->save();

          Alert::success('Actualizado', 'Título y descripción actualizados con éxito');
          return redirect()->route('manuales.edit',$manual->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manual  $manual
     * @return \Illuminate\Http\Response
     */
    public function destroy($manual)
    {
        $manual_destroy = Manual::where('id',$manual)->with('subtitle','subtitle.imagen')->get();

        foreach ($manual_destroy[0]->subtitle as $value) {

            $subtitle_manual = Subtitle_manual::findOrFail($value->id);//->delete();

            if (isset($subtitle_manual->imagen->ruta)) {

                unlink($subtitle_manual->imagen->ruta);
                $subtitle_manual->delete();
            }
            
        }

        $manual_destroy = Manual::findOrFail($manual)->delete();      

        Alert::success('Eliminado', 'Manual eliminado con éxito');
        return redirect()->route('manuales.index');
    }
}
