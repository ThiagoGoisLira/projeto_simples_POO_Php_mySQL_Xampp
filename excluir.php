<?php
// excluir.php

require_once 'config/database.php';
require_once 'models/Livro.php';

// Captura o ID passado via URL (Ex: excluir.php?id=5)
$id = $_GET['id'] ?? null;

if ($id) {
    $db = Database::conectar();
    
    // Chama o método estático de exclusão
    if (Livro::excluir($db, $id)) {
        header("Location: index.php?status=excluido");
        exit;
    }
}

// Se não houver ID, apenas volta para a home
header("Location: index.php");