<?php 

if(!empty($id)){
    $id = $_GET['id'];
    require("../../database/database_config.php");
    $sql = "DELETE FROM PRODUTO WHERE PRODUTO_ID = :id"; // Query para deletar um produto
    $stament = $pdo->prepare($sql); // Prepara a query
    $stament->bindParam(':id', $id, PDO::PARAM_INT); // Adiciona o parâmetro id
    $stament->execute(); // Executa a query
    header('Location: ../../views/index.php?page=produtos');
}
else{
    echo "Erro ao excluir o produto";
}

require("../../database/database_config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    
    try {
        $sql = "DELETE FROM PRODUTO WHERE PRODUTO_ID = :id"; // Query para deletar um produto
        $stament = $pdo->prepare($sql); // Prepara a query
        $stament->bindParam(':id', $id, PDO::PARAM_INT); // Adiciona o parâmetro id
        $stament->execute(); // Executa a query
        header('Location: ../../views/index.php?page=produtos');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

?>