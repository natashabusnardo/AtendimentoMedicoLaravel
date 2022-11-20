<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Medico_has_Especialidade;
use App\Models\Medico;
use App\Models\Especialidade;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medico_has_Especialidade>
 */
class Medico_has_EspecialidadeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'medico_id' => $this->faker->randomElement(Medico::pluck('id')),
            'especialidade_id' => $this->faker->randomElement(Especialidade::pluck('id')),
        ];
    }
}
