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
        Schema::create('medico_has_especialidade', function (Blueprint $table) {
            $table->foreignId('medico_id')->constrained('medicos');
            $table->foreignId('especialidade_id')->constrained('especialidades');
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
        Schema::table('medico_has_especialidade', function (Blueprint $table) {
            //
        });
    }
};
