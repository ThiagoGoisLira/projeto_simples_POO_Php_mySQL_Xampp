<?php
//Carrega as dependencias
require_once 'config/database.php';
require_once 'models/Livro.php';
//Captura o id enviado no médoto GET e busca no banco de dados
$id = $_GET['id'] ?? null;
$db = Database::conectar();
$livro = Livro::buscarPorId($db, $id);

// Se o livro não existir, volta para a lista
if (!$livro) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Livro</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 40px;
        }

        form {
            background: #eee;
            padding: 20px;
            border-radius: 8px;
            display: inline-block;
        }

        input {
            display: block;
            margin-bottom: 10px;
            padding: 8px;
            width: 300px;
        }

        .btn-editar-salvar {
            color: #059440;
            text-decoration: none;
            font-weight: bold;
            border: solid 1px #000000;
            background-color: #ffffff;
            padding: 6px 6px 6px 6px;
            cursor: pointer;
            border-radius: 25px;
        }

        .btn-editar-excluir {
            color: #dc3545;
            text-decoration: none;
            font-weight: bold;
            border: solid 1px #000000;
            background-color: #ffffff;
            padding: 5px 5px 5px 5px;
            border-radius: 25px;
        }
    </style>
</head>

<body>
    <h1>Editar Livro</h1>
<!--Local e forma de envio dos dados quando clicar em Salvar-->
    <form action="atualizar_processo.php" method="POST">
<!--Oculta o id com hidden para o usuario não ver esse Id. Com a função get ele preenche os campos com dados do banco de dados, para o usuario ver o que dai editar-->
        <input type="hidden" name="id" value="<?= $livro->getId() ?>">

        <label>Título:</label>
        <input type="text" name="titulo" value="<?= $livro->getTitulo() ?>" required>

        <label>Autor:</label>
        <input type="text" name="autor" value="<?= $livro->getAutor() ?>" required>

        <label>Volume:</label>
        <input type="number" name="volume" value="<?= $livro->getVolume() ?>" required>
<!--Botoes de ação para enviar ou  cancelar retornando a pagina index-->
        <button type="submit" class="btn-editar-salvar">Salvar Alterações</button>
        <a href="index.php" class="btn-editar-excluir">Cancelar</a>
    </form>
</body>

</html>