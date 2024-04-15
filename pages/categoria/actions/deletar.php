<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    deletarProduto($id); // Chama a função deletarProduto
}
function deletarProduto($id)
{
    try {
        require("../../../utils/database/dbConnect.php");
        $sql = "DELETE FROM categoria WHERE CATEGORIA_ID = :id"; // Query para deletar um produto
        $stament = $pdo->prepare($sql); // Prepara a query
        $stament->bindParam(':id', $id, PDO::PARAM_INT); // Adiciona o parâmetro id
        $stament->execute(); // Executa a query
        header('Location: ../index.php');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
