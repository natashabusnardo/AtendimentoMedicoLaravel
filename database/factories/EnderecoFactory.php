<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Paciente;
use App\Models\Cidade;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Endereco>
 */
class EnderecoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'paciente_id' => $this->faker->unique()->randomElement(Paciente::pluck('id')),
            'logradouro' => $this->faker->streetName,
            'numero' => $this->faker->buildingNumber,
            'cep' => $this->faker->numberBetween(10000000, 99999999),
            'bairro' => $this->faker->citySuffix,
            'complemento' => $this->faker->secondaryAddress,
            'cidade_id' => $this->faker->randomElement(Cidade::pluck('id')),
        ];
    }
}
