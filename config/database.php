<?php
// config/database.php

class Database {
    // Usamos static para não precisar instanciar a classe Database toda vez.
    public static function conectar() {
        try {
            // Configurações padrão do XAMPP: host=localhost, usuário=root, senha vazia
            $host = "localhost";
            $db   = "biblioteca";
            $user = "root";
            $pass = "";

            $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            // Define o modo de erro do PDO para EXCEPTION. 
            // Isso ajuda a identificar erros de SQL rapidamente durante o desenvolvimento.
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;
        } catch (PDOException $e) {
            // Se a conexão falhar, o script para e exibe a mensagem de erro.
            die("Erro crítico de conexão: " . $e->getMessage());
        }
    }
}
//Encerrando a conexão
$pdo = null;
?>