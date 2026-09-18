<?php
include("../infra/conexao.php");

$id = $_GET["id"];

$queryProduto = "SELECT p.id, p.nome, c.id AS categoria_id, c.descricao AS categoria, p.descricao, p.preco, p.quantidade, p.data_validade FROM produto p JOIN categoria c ON p.categoria_id = c.id WHERE p.id = $id";
$resultadoProduto = $conexao->query($queryProduto);

$produto = $resultadoProduto->fetch_assoc();

$queryCategoria = "SELECT id, descricao FROM categoria WHERE id != " . $produto['categoria_id'];
$resultadoCategoria = $conexao->query($queryCategoria);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
</head>

<body>
    <form action="crud/editar.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">

        <label for="nome">Nome do Produto:</label><br>
        <input type="text" id="nome" name="nome" value="<?php echo $produto['nome']; ?>" required><br><br>

        <label for="categoria">Categoria:</label><br>
        <select name="categoria_id" id="categoria">
            <option value="<?php echo $produto['categoria_id']; ?>" selected><?php echo $produto['categoria']; ?>
            </option>
            <?php

            while ($categoria = $resultadoCategoria->fetch_assoc()) {
                echo "<option value='" . $categoria['id'] . "'>" . $categoria['descricao'] . "</option>";
            }
            ?>
        </select><br><br>

        <label for="descricao">Descrição:</label><br>
        <textarea id="descricao" name="descricao" rows="4"
            cols="30"><?php echo $produto['descricao']; ?></textarea><br><br>

        <label for="preco">Preço (R$):</label><br>
        <input type="number" step="0.01" id="preco" name="preco" value="<?php echo $produto['preco']; ?>"
            required><br><br>

        <label for="quantidade_estoque">Quantidade em Estoque:</label><br>
        <input type="number" id="quantidade" name="quantidade" value="<?php echo $produto['quantidade']; ?>"
            required><br><br>

        <label for="data_validade">Data de Validade:</label><br>
        <input type="date" id="data_validade" name="data_validade" value="<?php echo $produto['data_validade']; ?>"
            required><br><br>

        <button type="submit">Salvar Alterações</button>
    </form>
</body>

</html>