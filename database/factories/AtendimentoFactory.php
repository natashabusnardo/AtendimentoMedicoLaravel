<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Paciente;
use App\Models\Medico;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Atendimento>
 */
class AtendimentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'paciente_id' => $this->faker->randomElement(Paciente::pluck('id')),
            'medico_id' => $this->faker->randomElement(Medico::pluck('id')),
            'gravidade' => $this->faker->randomElement(['1', '2', '3']),
            'cid_id' => $this->faker->words(2, true),
            'descricao' => $this->faker->words(10, true),
            'hora_atendimento' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
