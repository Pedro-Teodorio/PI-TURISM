<?php 

require("../../database/database_config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];

    try {
        $stmt_produto = $pdo -> prepare(
            "UPDATE PRODUTO
            SET CATEGORIA_ID = 9
            WHERE CATEGORIA_ID = :id"
        );
        $stmt_produto -> bindParam(':id', $id, PDO::PARAM_INT);
        $stmt_produto -> execute();

        $stmt = $pdo -> prepare(
            "DELETE
            FROM CATEGORIA
            WHERE CATEGORIA_ID = :id"
        );
        $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
        $stmt -> execute();

        header('Location: ../../views/index.php?page=categorias');
        
    } catch (PDOException $e) {
            echo $e->getMessage();
    }
}

?>