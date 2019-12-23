<?php

namespace App\Http\Controllers;

use App\Imagen;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->idsubtitle;

        $request->validate([
            
            'imagen'        => 'required|mimes:jpg,jpeg'

        ]);

        if ($request->hasFile('imagen')) {

            $nombre_archivo = uniqid().$request->file('imagen')->getClientOriginalName();
            $path           = $request->file('imagen')->storeAs('reporte', $nombre_archivo,'public');

        }

            $imagen                     = new Imagen();
            $imagen->subtitle_manual_id = $request->idsubtitle;
            $imagen->ruta               = $path;
            $imagen->save();

        Alert::success('Su imagen fue añadida', 'Imagen añadida con éxito');                
        return back()->with('mensaje', 'Imagen añadida con éxito');
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
        $edit = Imagen::findOrFail($id);

        return view('Manuales.edit_image',compact('edit'));
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
        $request->validate([
            
            'imagen'        => 'required|mimes:jpg,jpeg'

        ]);

        if ($request->hasFile('imagen')) {

            $nombre_archivo = uniqid().$request->file('imagen')->getClientOriginalName();
            $path           = $request->file('imagen')->storeAs('reporte', $nombre_archivo,'public');

        }
            //$edit_manuals = Imagen::where('id', $request->bookId)->update(['ruta' => $path]);
            $edit_manuals       = Imagen::findOrFail($request->bookId);
            
            //unlink(acá le damos la direccion exacta del archivo); unlink()borrar una imagen o un archivo del servidor.
            unlink($edit_manuals->ruta);
            $edit_manuals->ruta = $path;
            $edit_manuals->save();

        Alert::success('Actualizado', 'Imagen actualizada con éxito');               
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
        
        $subtitle_manual = Imagen::findOrFail($id);
        /*unlink()borrar una imagen o un archivo del servidor.
        unlink(acá le damos la direccion exacta del archivo)*/
        unlink($subtitle_manual->ruta);
        $subtitle_manual->delete();

        Alert::success('Eliminado', 'Imagen eliminada con éxito');
        return back();

    }
}
