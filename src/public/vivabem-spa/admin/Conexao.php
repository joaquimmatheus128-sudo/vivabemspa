<?php

class Conexao{
    public static function LigarConexao(){
        // Dados de conexão
        $host     = "localhost";
        $username = "root";
        $password = "";
        $dbname   = "db_vivabemspa";

        try{
            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;

        } catch (PDOException $e){
            echo "ERRO de conexão " . $e->getMessage();
        }
        
        


    }


}