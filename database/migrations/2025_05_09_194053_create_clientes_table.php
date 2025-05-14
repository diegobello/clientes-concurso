<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('cli_id');
            $table->string('cli_nombre');
            $table->string('cli_apellido');
            $table->integer('cli_cedula')->unique();
            $table->unsignedBigInteger('departamento_id');
            $table->unsignedBigInteger('municipio_id');
            $table->string('cli_celular');
            $table->string('cli_email')->unique();
            $table->boolean('cli_terminos_condiciones')->default(false);
            $table->timestamps();

            $table->foreign('departamento_id')->references('dep_id')->on('departamentos');
            $table->foreign('municipio_id')->references('mun_id')->on('municipios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
