<?php

namespace App\Services;

use App\Models\AlunoModel;

class GetDataService
{

   public function getDataEscola()
   {
      $dadosAlunosEscola = AlunoModel::query()
         ->orderBy("id_aluno", "desc");
      return $dadosAlunosEscola;
   }
}
