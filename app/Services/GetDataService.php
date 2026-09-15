<?php

namespace App\Services;

use App\Models\AlunoModel;
use App\Models\TurmaModel;

class GetDataService
{

   public function getDataAluno()
   {
      $dadosAlunosEscola = AlunoModel::query()
         ->orderBy("id_aluno", "desc")
         ->with('matricula');
      return $dadosAlunosEscola;
   }
   public function getDataTurma()
   {
      $dadosTurmaEscola = TurmaModel::query()
         ->orderBy("id_turma", "desc");
      return $dadosTurmaEscola;
   }
}
