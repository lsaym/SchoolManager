<?php

namespace App\Models;

use App\Models\AlunoModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MatriculaModel extends Model
{
    protected $table = "matricula";
    protected $fillable = [];

    use HasFactory;

    public function aluno(): BelongsTo
    {
        return $this->belongsTo(AlunoModel::class, "id_aluno");
    }
}
