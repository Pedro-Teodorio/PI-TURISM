<?php
require("../../database/database_config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $ativo = isset($_POST['ativo']) ? 1 : 0;

    try {
        $sql = "INSERT INTO CATEGORIA (CATEGORIA_NOME, CATEGORIA_DESC, CATEGORIA_ATIVO) VALUES (:nome, :descricao, :ativo)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
        $stmt->bindParam(':ativo', $ativo, PDO::PARAM_INT);
        $stmt->execute();
        header('Location: ../../views/index.php?page=categorias');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
