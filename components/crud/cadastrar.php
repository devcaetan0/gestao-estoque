<?php
include("../../infra/conexao.php");

$nome = $_POST["nome"];
$categoria = $_POST["categoria_id"];
$descricao = $_POST["descricao"];
$preco = $_POST["preco"];
$quantidade = $_POST["quantidade"];
$data_validade = strval($_POST["data_validade"]);

$query = "INSERT INTO produto (nome, categoria_id, descricao, preco, quantidade, data_validade) VALUES (?, ?, ?, ?, ?, ?)";

$comando = mysqli_prepare($conexao, $query);
mysqli_stmt_bind_param($comando, "sisdds", $nome, $categoria, $descricao, $preco, $quantidade, $data_validade);

mysqli_stmt_execute($comando);

header("Location: ../../index.php");
exit();
?>