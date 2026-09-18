<?php
include("../infra/conexao.php");

$produto = $_GET["id"];
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
</head>

<body>
    <form action="cadastrar.php" method="POST">
        <label for="nome">Nome do Produto:</label><br>
        <input type="text" id="nome" name="nome" value="<?php echo $produto['nome']; ?>" required><br><br>

        <label for="categoria">Categoria:</label><br>
        <select name="categoria_id" id="categoria">
            <option value="">Selecione uma categoria</option>
            <option value="<?php echo $produto['categoria_id']; ?>" selected><?php echo $produto['categoria']; ?>
            </option>
        </select><br><br>

        <label for="descricao">Descrição:</label><br>
        <textarea id="descricao" name="descricao" rows="4"
            cols="30"><?php echo $produto['descricao']; ?></textarea><br><br>

        <label for="preco">Preço (R$):</label><br>
        <input type="number" step="0.01" id="preco" name="preco" value="<?php echo $produto['preco']; ?>"
            required><br><br>

        <label for="quantidade_estoque">Quantidade em Estoque:</label><br>
        <input type="number" id="quantidade_estoque" name="quantidade_estoque"
            value="<?php echo $produto['quantidade']; ?>" required><br><br>

        <label for="data_validade">Data de Validade:</label><br>
        <input type="date" id="data_validade" name="data_validade" value="<?php echo $produto['data_validade']; ?>"
            required><br><br>

        <button type="submit">Salvar alterações</button>
    </form>
</body>

</html>