<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\MatriculaModel;

class AlunoModel extends Model
{
    use HasFactory;

    protected $table = 'aluno';

    protected $fillable = [
        'nome',
        'cpf',
        'data_nascimento',
        'sexo',
        'email',
        'telefone',
        'endereco',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'cep',
        'status',
    ];


    public function matricula(): HasOne
    {
        return $this->hasOne(MatriculaModel::class, 'id_aluno', 'id_aluno');
    }
}
