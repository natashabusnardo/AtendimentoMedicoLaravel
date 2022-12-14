<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            EstadoSeeder::class,
            CidadeSeeder::class,
            PacienteSeeder::class,
            MedicoSeeder::class,
            EspecialidadeSeeder::class,
            Medico_has_EspecialidadeSeeder::class,
            EnderecoSeeder::class,
            AtendimentoSeeder::class,
        ]);
    }
}
