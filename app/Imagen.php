<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table    = 'imagens';

    protected $fillable = ['ruta','subtitle_manual_id'];

    public function subtitle_manual() {

    return $this->belongsTo('App\Subtitle_manual');

    }
}
