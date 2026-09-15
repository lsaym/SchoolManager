<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
