<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subtitle_manual;
use App\Imagen;
use App\Manual;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class SubtitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $validator = Validator::make($request->all(),[

            'Subtitulo' => 'required|min:5|max:600', 
            //'required|array|max:255',
            'Contenido' => 'required|min:5|max:600'
            //'required|array|max:600'
        ]);

            $errors = $validator->errors();

            $contenido = $errors->first('Contenido');
            $subtitulo = $errors->first('Subtitulo');

            // $contenido = str_replace(".0", " ", $contenido);
            // $subtitulo = str_replace(".0", " ", $subtitulo);

            if ($validator->fails()) {

                alert()->html(

                    '<h2>Error</h2>',
                    "$subtitulo"."<br>".
                    "$contenido",
                    'error');

                return back(); 
            }

            //for($i = 0 ; $i < count($request->Contenido); $i++){

                $subtitle=$request->Contenido;

                if (isset($subtitle) ? $subtitle : ''){

                    $subtitle_manual                       = new Subtitle_manual();
                    $subtitle_manual->manual_id            = $request->id_manuals;
                    $subtitle_manual->subtitle_name        = $request->Subtitulo;
                    $subtitle_manual->subtitle_description = $request->Contenido;
                    $subtitle_manual->save();

                    $img=$request->imagen;

                    if (isset($img) ? $img : ''){
                   
                        $nombre_archivo = uniqid().$img->getClientOriginalName();
                        $path           = $request->imagen->storeAs('reporte', $nombre_archivo,'public');
                        $imagen                     = new Imagen();
                        $imagen->subtitle_manual_id = $subtitle_manual->id;
                        $imagen->ruta               = $path;
                        $imagen->save();

                    }
                }
            //}

        Alert::success('Agregado', 'Subtítulo agregado con éxito');
        return redirect()->route('manuales.edit',$request->id_manuals);  
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

            'subtitulo'   => 'required|min:5|max:255',
            'contenido'   => 'required|min:5|max:600'

        ]);

         $errors      = $validator->errors();
            
         $subtitulo   = $errors->first('subtitulo');
         $contenido   = $errors->first('contenido');

        if ($validator->fails()) {

            alert()->html(

                '<h2>Error</h2>',
                "$subtitulo"."<br>".
                "$contenido",
                'error');

            return back(); 
        }

        $subtitle_manual = Subtitle_manual::where('id', $id)
                         ->update([

                            'subtitle_name'        => $request->subtitulo,
                            'subtitle_description' => $request->contenido

                         ]);

        Alert::success('Actualizado', 'Subtítulo actualizado con éxito');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $subtitle_manual = Subtitle_manual::findOrFail($id);//->delete();

        if (isset($subtitle_manual->imagen->ruta)){

            unlink($subtitle_manual->imagen->ruta);

        }
        
        $subtitle_manual->delete();

        Alert::success('Eliminado', 'Subtítulo eliminado con éxito');
        return back();

    }
}
