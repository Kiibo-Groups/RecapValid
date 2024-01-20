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
        Schema::create('AmisInfo', function (Blueprint $table) {
            $table->id();
            $table->string('up_files_id');
            $table->string('poliza');
            $table->string('start_vig');
            $table->string('end_vig');
            $table->string('marca');
            $table->string('submarca');
            $table->string('modelo');
            $table->string('cancelable');
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
        Schema::dropIfExists('AmisInfo');
    }
};
