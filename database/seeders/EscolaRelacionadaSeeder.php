<?php

namespace Database\Seeders;

use Database\Factories\DadosEscolaresFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EscolaRelacionadaSeeder extends Seeder
{
    public function run(): void
    {
        $factory = DadosEscolaresFactory::new();

        DB::transaction(function () use ($factory): void {
            DB::table('escola')->orderBy('id_escola')->each(function (object $escola) use ($factory): void {
                $this->popularEscola($escola->id_escola, $factory);
            });
        });
    }

    private function popularEscola(int $idEscola, DadosEscolaresFactory $factory): void
    {
        $unidades = collect(range(1, 2))->map(fn () => DB::table('unidades')->insertGetId([
            'id_escola' => $idEscola,
            ...$factory->unidade(),
        ], 'id_unidade'));

        $anoLetivo = DB::table('ano_letivo')->insertGetId([
            'id_escola' => $idEscola,
            'ano' => now()->year,
            'data_inicio' => now()->startOfYear(),
            'data_fim' => now()->endOfYear(),
            'status' => 'ativo',
        ], 'id_ano_letivo');

        $professores = collect(range(1, 6))->map(fn () => DB::table('professor')->insertGetId([
            'id_escola' => $idEscola,
            ...$factory->professor(),
        ], 'id_professor'));

        $disciplinas = collect(range(1, 6))->map(fn () => DB::table('disciplina')->insertGetId([
            'id_escola' => $idEscola,
            ...$factory->disciplina(),
        ], 'id_disciplina'));

        $mensalidades = collect(range(1, 3))->map(fn () => DB::table('mensalidade')->insertGetId([
            'id_escola' => $idEscola,
            ...$factory->mensalidade(),
        ], 'id_mensalidade'));

        $turmas = collect(range(1, 4))->map(function (int $numero) use ($idEscola, $unidades, $anoLetivo, $professores): int {
            return DB::table('turma')->insertGetId([
                'id_escola' => $idEscola,
                'id_unidade' => $unidades->random(),
                'id_ano_letivo' => $anoLetivo,
                'id_professor' => $professores->random(),
                'nome' => $numero.'º Ano '.fake()->randomElement(['A', 'B']),
                'serie' => $numero.'º Ano',
                'turno' => fake()->randomElement(['Manhã', 'Tarde']),
                'capacidade' => 35,
                'status' => 'ativo',
            ], 'id_turma');
        });

        $alunos = DB::table('aluno')->where('id_escola', $idEscola)->pluck('id_aluno')->shuffle()->take(80);

        if ($alunos->isEmpty()) {
            return;
        }

        $turmaPorAluno = [];
        foreach ($alunos as $indice => $idAluno) {
            $idTurma = $turmas[$indice % $turmas->count()];
            $turmaPorAluno[$idAluno] = $idTurma;
            DB::table('matricula')->insert([
                'id_aluno' => $idAluno,
                'id_turma' => $idTurma,
                'matricula' => now()->year.str_pad((string) $idAluno, 6, '0', STR_PAD_LEFT),
                'data_matricula' => now()->startOfYear(),
                'status' => 'ativa',
            ]);
        }

        $responsaveis = $alunos->take(40)->map(function (int $idAluno) use ($idEscola, $factory): int {
            $idResponsavel = DB::table('responsavel')->insertGetId([
                'id_escola' => $idEscola,
                ...$factory->responsavel(),
            ], 'id_responsavel');

            DB::table('responsavel_aluno')->insert([
                'id_aluno' => $idAluno,
                'id_responsavel' => $idResponsavel,
                'responsavel_principal' => true,
            ]);

            return $idResponsavel;
        });

        DB::table('usuario')->updateOrInsert(
            ['email' => 'admin.escola'.$idEscola.'@example.test'],
            [
                'id_escola' => $idEscola,
                'nome' => 'Administrador '.$idEscola,
                'password' => bcrypt('password'),
                'tipo' => 'administrador',
                'status' => 'ativo',
            ],
        );

        $turmaDisciplinas = $turmas->flatMap(function (int $idTurma) use ($professores, $disciplinas): array {
            return $disciplinas->take(3)->map(fn (int $idDisciplina) => DB::table('turma_disciplina')->insertGetId([
                'id_professor' => $professores->random(),
                'id_disciplina' => $idDisciplina,
                'id_turma' => $idTurma,
                'carga_horaria' => 60,
            ], 'id_turma_disciplina'))->all();
        });

        $aulas = $turmaDisciplinas->map(fn (int $idTurmaDisciplina) => DB::table('aula')->insertGetId([
            'id_turma_disciplina' => $idTurmaDisciplina,
            'data' => now()->subDays(fake()->numberBetween(1, 45)),
            'conteudo' => fake()->sentence(8),
        ], 'id_aula'));

        foreach ($aulas as $idAula) {
            foreach ($alunos->take(20) as $idAluno) {
                DB::table('frequencia')->insert([
                    'id_aula' => $idAula,
                    'id_aluno' => $idAluno,
                    'presenca' => fake()->boolean(90),
                    'justificativa' => null,
                ]);
            }
        }

        $avaliacoes = $turmaDisciplinas->map(fn (int $idTurmaDisciplina) => DB::table('avaliacao')->insertGetId([
            'id_turma_disciplina' => $idTurmaDisciplina,
            'nome' => 'Avaliação '.fake()->randomElement(['Bimestral', 'Mensal', 'Diagnóstica']),
            'tipo' => fake()->randomElement(['Prova', 'Trabalho', 'Atividade']),
            'data' => now()->subDays(fake()->numberBetween(1, 30)),
            'peso' => fake()->numberBetween(1, 3),
        ], 'id_avaliacao'));

        foreach ($avaliacoes as $idAvaliacao) {
            foreach ($alunos->take(20) as $idAluno) {
                DB::table('nota')->insert([
                    'id_avaliacao' => $idAvaliacao,
                    'id_aluno' => $idAluno,
                    'nota' => fake()->randomFloat(2, 5, 10),
                    'observacao' => null,
                ]);
            }
        }

        foreach ($alunos->take(30) as $idAluno) {
            $valor = fake()->randomFloat(2, 350, 950);
            $idContrato = DB::table('contrato')->insertGetId([
                'id_aluno' => $idAluno,
                'id_mensalidade' => $mensalidades->random(),
                'data_inicio' => now()->startOfYear(),
                'data_fim' => now()->endOfYear(),
                'status' => 'ativo',
            ], 'id_contrato');

            $idParcela = DB::table('parcelas')->insertGetId([
                'id_contrato' => $idContrato,
                'parcela' => '01/'.now()->year,
                'desc' => 'Mensalidade escolar',
                'valor' => $valor,
                'data_vencimento' => now()->startOfMonth()->addDays(10),
                'status' => 'paga',
            ], 'id_parcela');

            DB::table('pagamento')->insert([
                'id_parcela' => $idParcela,
                'valor' => $valor,
                'data_pagamento' => now()->startOfMonth()->addDays(8),
                'forma_pagamento' => fake()->randomElement(['Pix', 'Boleto', 'Cartão']),
            ]);
        }
    }
}
