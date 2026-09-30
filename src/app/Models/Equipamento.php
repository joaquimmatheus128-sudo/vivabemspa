<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    protected $table = 'tbl_equipamento';

    protected $primaryKey = 'id_equipamento';

    public const CREATED_AT = 'data_criacao';
    public const UPDATED_AT = 'data_atualizacao';

    protected $fillable = [
        'nome_equipamento',
        'descricao_equipamento',
        'status_equipamento',
    ];
}