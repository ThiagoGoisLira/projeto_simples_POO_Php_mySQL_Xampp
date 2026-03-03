<?php
//Carrega as dependencias
require_once 'config/database.php';
require_once 'models/Livro.php';
//Confirma que os dados vieram de um formulário (POST) e abre o canal de comunicação com o banco de dados
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = Database::conectar();
    
    // Cria um objeto com os novos dados
    $livro = new Livro($_POST['titulo'], $_POST['autor'], $_POST['volume']);
    // Com o WHERE: Ele localiza exatamente a linha que possui aquele ID específico
    $sql = "UPDATE livros SET titulo = ?, autor = ?, volume = ? WHERE id = ?";
    //prepare(): O PHP envia o comando SQL "vazio" (com as interrogações) para o MySQL. execute([...]): O PHP envia os dados reais para preencher as lacunas.
    $stmt = $db->prepare($sql);
    if ($stmt->execute([$_POST['titulo'], $_POST['autor'], $_POST['volume'], $_POST['id']])) {
    //banco de dados confirmar que a alteração foi feita com sucesso, o PHP envia o usuário de volta para a página inicial (index.php) e adiciona um "aviso" na URL (status=atualizado)
        header("Location: index.php?status=atualizado");
    } else {
        echo "Erro ao atualizar.";
    }
}
?>