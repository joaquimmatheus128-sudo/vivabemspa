<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'tbl_categoria';

    protected $primaryKey = 'id_categoria';

    public const CREATED_AT = 'data_criacao';

    public const UPDATED_AT = 'data_atualizacao';

    protected $fillable = [
        'nome_categoria',
        'status_categoria',
    ];
}
