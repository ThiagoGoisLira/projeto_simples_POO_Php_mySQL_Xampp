<?php
// cadastrar.php

// Ativamos erros para depuração (importante no aprendizado)
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'config/database.php';
require_once 'models/Livro.php';

// Verifica se o formulário foi enviado via método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conecta ao banco
    $db = Database::conectar();
    
    // Captura os dados com segurança (operador ?? garante valor padrão se estiver vazio)
    $titulo = $_POST['titulo'] ?? '';
    $autor  = $_POST['autor'] ?? '';
    $volume = $_POST['volume'] ?? 0;

    // Cria o objeto Livro e executa o salvamento
    $novoLivro = new Livro($titulo, $autor, $volume);

    if ($novoLivro->salvar($db)) {
        // Redireciona de volta para o index.php com um status de sucesso na URL
        header("Location: index.php?status=sucesso");
        exit;
    } else {
        echo "Erro ao salvar o livro no sistema.";
    }
}