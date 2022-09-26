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
        Schema::create('enderecos', function (Blueprint $table) {
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->primary('paciente_id');
            $table->string('logradouro', 100);
            $table->string('numero', 10)->nullable();
            $table->string('cep', 8);
            $table->string('bairro', 45);
            $table->string('complemento', 255)->nullable();
            $table->timestamps();
            $table->unsignedBigInteger ('cidade_id');
            $table->foreign('cidade_id')->references('id')->on('cidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
};
