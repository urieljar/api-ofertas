<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->string('mensaje');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger("proyecto_id");
            $table->unsignedBigInteger("tarjeta_id");
           $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");
           $table->foreign("proyecto_id")->references("id")->on("proyectos")->onDelete("cascade");
           $table->foreign("tarjeta_id")->references("id")->on("tarjetas")->onDelete("cascade");
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
        Schema::dropIfExists('solicitudes');
    }
}
