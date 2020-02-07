<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubtitleManualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subtitle_manuals', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('manual_id')->unsigned();
            $table->text('subtitle_name',255);
            $table->text('subtitle_description', 600);
            $table->timestamps();

            //Relacion
            $table->foreign('manual_id')->references('id')->on('manuals')
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
        Schema::dropIfExists('subtitle_manuals');
    }
}
