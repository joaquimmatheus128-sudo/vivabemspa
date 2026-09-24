<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $table = 'tbl_servico';
    protected $primaryKey = 'id_servico';

    public $timestamps = false;

    protected $fillable = [
        'nome_servico',
        'slug', // Certifica-te que a tua tabela tem esta coluna
        'descricao_servico',
        'imagem_servico',
        'indicacoes_servico',
        'status_servico'
    ];

    // Converte automaticamente o texto/JSON para Array no PHP
    protected $casts = [
        'indicacoes_servico' => 'array',
    ];
}