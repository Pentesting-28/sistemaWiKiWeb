<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manual extends Model
{   
	protected $table = 'manuals';
	
    //Codigo para el control de la asignación masiva de datos
    protected $fillable = ['name','description'];
    //para que no se cambie directamente los campos.

     public function subtitle()
    {
        return $this->hasMany('App\Subtitle_manual');
    }

}
