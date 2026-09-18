<?php
include("infra/conexao.php");

$queryTabela = "SELECT p.id, p.nome, c.descricao AS categoria, p.descricao, p.preco, p.quantidade, p.data_validade FROM produto p JOIN categoria c ON p.categoria_id = c.id";
$resultadoTabela = $conexao->query($queryTabela);

$queryCategoria = "SELECT id, descricao FROM categoria";
$resultadoCategoria = $conexao->query($queryCategoria);
?>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Gestão de Estoque - Mercado</title>
</head>

<body>

    <h1>Sistema de Gestão de Estoque</h1>

    <h2>Cadastrar Novo Produto</h2>

    <form action="components/crud/cadastrar.php" method="POST">
        <label for="nome">Nome do Produto:</label><br>
        <input type="text" id="nome" name="nome" value="Teste" required><br><br>

        <label for="categoria">Categoria:</label><br>
        <select name="categoria_id" id="categoria" required>
            <option value="">Selecione</option>
            <?php
            while ($categoria = $resultadoCategoria->fetch_assoc()) {
                echo "<option value='" . $categoria['id'] . "'>" . $categoria['descricao'] . "</option>";
            }
            ?>
        </select><br><br>

        <label for="descricao">Descrição:</label><br>
        <textarea id="descricao" name="descricao">Teste</textarea><br><br>

        <label for="preco">Preço (R$):</label><br>
        <input type="number" step="0.01" id="preco" name="preco" value="0.00" required><br><br>

        <label for="quantidade">Quantidade em Estoque:</label><br>
        <input type="number" id="quantidade" name="quantidade" value="0" required><br><br>

        <label for="data_validade">Data de Validade:</label><br>
        <input type="date" id="data_validade" name="data_validade" required><br><br>

        <button type="submit">Cadastrar Produto</button>
    </form>

    <hr>

    <h2>Produtos Cadastrados</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th>Validade</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php

            while ($produto = $resultadoTabela->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $produto['id'] . "</td>";
                echo "<td>" . $produto['nome'] . "</td>";
                echo "<td>" . $produto['categoria'] . "</td>";
                echo "<td>" . $produto['descricao'] . "</td>";
                echo "<td> R$ " . $produto['preco'] . "</td>";
                echo "<td>" . $produto['quantidade'] . "</td>";
                echo "<td>" . $produto['data_validade'] . "</td>";
                echo "<td>
                        <a href='components/edicao.php?id=" . $produto['id'] . "'>Editar</a> | 
                        <a href='components/crud/deletar.php?id=" . $produto['id'] . "'>Excluir</a>
                      </td>";
                echo "</tr>";
            }

            ?>

        </tbody>
    </table>

</body>

</html>