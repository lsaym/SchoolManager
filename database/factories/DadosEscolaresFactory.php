<?php

namespace Database\Factories;

use App\Models\EscolaModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Gera dados fictícios para as tabelas que compõem uma escola.
 *
 * @extends Factory<EscolaModel>
 */
class DadosEscolaresFactory extends Factory
{
    protected $model = EscolaModel::class;

    public function definition(): array
    {
        return [];
    }

    public function unidade(): array
    {
        return [
            'nome' => 'Unidade '.$this->faker->city(),
            'endereco' => $this->faker->streetName(),
            'numero' => $this->faker->numberBetween(1, 999),
            'bairro' => $this->faker->citySuffix(),
            'cidade' => $this->faker->city(),
            'estado' => $this->faker->stateAbbr(),
            'cep' => (int) $this->faker->numerify('########'),
        ];
    }

    public function professor(): array
    {
        return [
            'nome' => $this->faker->name(),
            'cpf' => $this->faker->unique()->numerify('###########'),
            'email' => $this->faker->unique()->safeEmail(),
            'data_nascimento' => $this->faker->dateTimeBetween('-65 years', '-23 years'),
            'registro_pro' => 'PRO-'.$this->faker->unique()->numerify('######'),
            'status' => 'ativo',
        ];
    }

    public function responsavel(): array
    {
        return [
            'nome' => $this->faker->name(),
            'cpf' => $this->faker->unique()->numerify('###########'),
            'email' => $this->faker->unique()->safeEmail(),
            'telefone' => $this->faker->phoneNumber(),
            'parentesco' => $this->faker->randomElement(['Mãe', 'Pai', 'Avó', 'Avô', 'Responsável legal']),
        ];
    }

    public function disciplina(): array
    {
        return [
            'nome' => $this->faker->unique()->randomElement([
                'Matemática', 'Português', 'Ciências', 'História', 'Geografia',
                'Inglês', 'Educação Física', 'Artes',
            ]),
            'carga_horaria' => $this->faker->randomElement([40, 60, 80]),
            'status' => 'ativo',
        ];
    }

    public function mensalidade(): array
    {
        return [
            'nome' => 'Mensalidade '.$this->faker->randomElement(['Infantil', 'Fundamental I', 'Fundamental II']),
            'valor' => $this->faker->randomFloat(2, 350, 950),
            'periodicidade' => 'mensal',
            'status' => 'ativo',
        ];
    }
}
