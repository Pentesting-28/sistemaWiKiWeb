<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subtitle_manual extends Model
{  
    protected $table = 'subtitle_manuals';
     
    //Codigo para el control de la asignación masiva de datos
    protected $fillable = ['subtitle_name','subtitle_description','manual_id'];
    //para que no se cambie directamente los campos.

    public function imagen(){

        return $this->hasOne('App\Imagen');
    }

        public function manual() {

    return $this->belongsTo('App\Manual');

    }
}
