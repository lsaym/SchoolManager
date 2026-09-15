<?php

namespace Database\Factories;

use App\Models\AlunoModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AlunoModel>
 */
class AlunoModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_escola' => 1,
            'nome' => $this->faker->name(),
            'cpf' => $this->faker->numberBetween(10000000, 99999999),
            'data_nascimento' => $this->faker->date('Y/m/d'),
            'sexo' => $this->faker->randomElement(['f', 'm']),
            'email' => $this->faker->safeEmail(),
            'telefone' => $this->faker->phoneNumber(),
            'endereco' => $this->faker->address(),
            'numero' => $this->faker->numberBetween(1, 100),
            'bairro' => $this->faker->name(),
            'cidade' => $this->faker->city(),
            'estado' => $this->faker->state(),
            'cep' => fake()->numerify('########'),
        ];
    }
}
