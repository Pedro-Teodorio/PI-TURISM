<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    deletarProduto($id);
}
function deletarProduto($id)
{
    try {
        require("../../../utils/database/dbConnect.php");
        $stmt_quantidade = $pdo->prepare("DELETE FROM PRODUTO_ESTOQUE WHERE PRODUTO_ID = :id");
        $stmt_quantidade->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt_quantidade->execute();

        $stmt_imagem = $pdo->prepare("DELETE FROM PRODUTO_IMAGEM WHERE PRODUTO_ID = :id");
        $stmt_imagem->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt_imagem->execute();

        $stmt = $pdo->prepare("DELETE FROM PRODUTO WHERE PRODUTO_ID = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        header('Location: ../index.php');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
