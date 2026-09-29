<?php
if ($preco < 0) {
    echo "<script>alert('Erro: O preço não pode ser negativo.');</script>";
    exit();
}

if ($quantidade < 0) {
    echo "<script>alert('Erro: A quantidade não pode ser negativa.');</script>";
    exit();
}

if ($data_validade < $data_atual) {
    echo "<script>alert('Erro: A data de validade não pode ser anterior à data atual.');</script>";
    exit();
}
?>