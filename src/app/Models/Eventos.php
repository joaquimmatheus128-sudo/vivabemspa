<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

Class Eventos extends Model{

    protected $table = 'tbl_evento';
    protected $primaryKey = 'id_evento';

    public $timestamps = false;

    protected $fillable = [
        'id_categoria',
        'imagem_evento',
        'data_evento',
        'nome_evento',
        'status_evento',
        'descricao_evento'
    ];
}