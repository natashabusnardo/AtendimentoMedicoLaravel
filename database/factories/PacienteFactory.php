<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'cpf' => $this->faker->numberBetween(10000000000, 99999999999),
            'telefone' => $this->faker->phoneNumber,
            'data_nascimento' => $this->faker->date(),
            'email' => $this->faker->email,
        ];
    }
}
