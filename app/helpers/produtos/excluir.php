<?php
require("../../database/database_config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];

    try {
        $stmt_quantidade = $pdo->prepare("DELETE FROM PRODUTO_ESTOQUE WHERE PRODUTO_ID = :id");
        $stmt_quantidade->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt_quantidade->execute();

        $stmt_imagem = $pdo->prepare("DELETE FROM PRODUTO_IMAGEM WHERE PRODUTO_ID = :id");
        $stmt_imagem->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt_imagem->execute();

        $stmt = $pdo->prepare("DELETE FROM PRODUTO WHERE PRODUTO_ID = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        header('Location: ../../views/index.php?page=produtos');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
