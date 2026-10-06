<?php

namespace App\Models;

// 1. Importa a classe Authenticatable do Laravel
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'tbl_usuario';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;

    protected $fillable = [
        'nome_usuario',
        'email_usuario',
        'senha_usuario',
        'nivel_usuario',
        'status_usuario'
    ];

    protected $hidden = [
        'senha_usuario', // Esconde a senha por segurança
    ];
    
    // Se a coluna da tua senha na base de dados NÃO se chamar 'password', 
    // precisas de avisar o Laravel qual é o nome dela adicionando este método:
    public function getAuthPassword()
    {
        return $this->senha_usuario; // Altera para 'senha_usuario' ou o nome exato da coluna da senha
    }
}