<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServitecaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serviteca', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('serviteca_nombre', 200);
            $table->string('serviteca_direccion', 200);
            $table->string('serviteca_email', 200);
            $table->string('serviteca_telefono', 200);
            $table->string('serviteca_horario', 100);
            $table->double('serviteca_latitud');
            $table->double('serviteca_longitud');
            $table->text('serviteca_servicios');
            $table->text('serviteca_imagen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('serviteca');
    }
}
