<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('subtitle_manual_id')->unsigned();
            $table->string('ruta')->unique;
            $table->timestamps();
        
            //Relacion
            $table->foreign('subtitle_manual_id')->references('id')->on('subtitle_manuals')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagens');
    }
}

            