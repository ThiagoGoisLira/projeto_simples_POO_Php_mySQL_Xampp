<?php

//Carrega a pagina uma unica vez
require_once 'config/database.php';
require_once 'models/Livro.php';

// Obtém a conexão e a lista de objetos
$db = Database::conectar();
$listaDeLivros = Livro::listarTodos($db);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Minha Biblioteca - CRUD PHP</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <div class="container">
        <h1>📚 Biblioteca Digital</h1>
    <!--Condição if/else para verificar sucesso do cadastro ou exclusão, lendo o GET do url-->
        <?php if (isset($_GET['status'])): ?>
        <div class="msg sucesso">
            <?= $_GET['status'] == 'sucesso' ? "✅ Livro cadastrado!" : ($_GET['status'] == 'atualizado' ? "✅ Livro editado!" : "🗑️ Livro removido!") ?>
        </div>
        <?php endif; ?>
    <!--Entrada simples em formulario para adicionar novos livros-->
        <form action="cadastrar.php" method="POST">
            <input type="text" name="titulo" placeholder="Título" required>
            <input type="text" name="autor" placeholder="Autor" required>
            <input type="number" name="volume" placeholder="Vol" style="width: 50px;" required>
            <button type="submit">Adicionar à Estante</button>
        </form>
    <!--Inicio da tabela de apresentação dos dados-->
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Vol.</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            <!--Foreach para cada conjuto livro/autor/volume-->
                <?php foreach ($listaDeLivros as $livro): ?>
                <tr>
                <!--Chamamos o metodo Getter, escrevemos dentro da celula da tabela-->
                    <td><?= $livro->getTitulo() ?></td>
                    <td><?= $livro->getAutor() ?></td>
                    <td><?= $livro->getVolume() ?></td>
                    <td>
                <!--Gera um lik unico para cada linha, ao usar uma ação o arquivo editar.php e acessado e executa a função definida de editar ou excluir-->
                        <a href="editar.php?id=<?= $livro->getId() ?>" class="btn-editar">Editar</a> |

                        <a href="excluir.php?id=<?= $livro->getId() ?>" class="btn-excluir" onclick="...">Excluir</a>
                    </td>

                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>