<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_xlsx', function (Blueprint $table) {
            $table->id();
            $table->string('municipio');
            $table->string('colonia');
            $table->string('marca');
            $table->string('linea');
            $table->string('tipo');
            $table->integer('modelo');
            $table->string('type_person');
            $table->string('sexo');
            $table->integer('puertas');
            $table->string('vin');
            $table->string('placa');
            $table->string('color');
            $table->string('procedencia');
            $table->string('servicio');
            $table->string('adeudo');
            $table->integer('propietarios');
            $table->integer('status');
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
        Schema::dropIfExists('upload_xlsx');
    }
};
