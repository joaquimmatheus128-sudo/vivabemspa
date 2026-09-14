<?php

class ClassContato{

    // Atributos
    public $nomeContato;
    public $emailContato;
    public $foneContato;
    public $assuntoContato;
    public $mensContato;

    // Inserir
    public function Inserir(){
        $sql = "INSERT INTO tbl_contato(
        nome_contato,
        email_contato,
        telefone_contato,
        assunto_contato,
        mensagem_contato
        ) VALUES ( 
        '". $this->nomeContato ."',
        '". $this->emailContato ."',
        '". $this->foneContato ."',
        '". $this->assuntoContato ."',
        '". $this->mensContato ."'
        );";

        require_once('Conexao.php');

        $conexao = Conexao::LigarConexao();
        
        $conexao->exec($sql);
    }

}