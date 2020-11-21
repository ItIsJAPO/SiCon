<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispotivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispositivos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('folio');
            $table->foreignId('tipo_dispositivo_id')->constrained("tipo_dispositivos");
            $table->float('precio_unitario');
            $table->integer('estatus')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dispotivos');
    }
}
