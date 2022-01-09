<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarjetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** 
         * categoria
         * subcategoria 
         * nombre
         * rfc
         * telefono
         * contacto
         * tel_contacto
         * email_contacto
         */
        Schema::create('tarjetas', function (Blueprint $table) {
            $table->id();
            $table->string('categoria');
            $table->string('subcategoria');
            $table->string('nombre');
            $table->string('rfc')->unique();
            $table->string('telefono')->nullable();;
            $table->string('contacto');
            $table->string('tel_contacto');
            $table->string('email_contacto')->unique();
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
        Schema::dropIfExists('tarjetas');
    }
}
