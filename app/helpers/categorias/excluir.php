<?php 

if(!empty($id)){
    $id = $_GET['id'];
    require("../../database/database_config.php");
    $sql = "DELETE FROM CATEGORIA WHERE CATEGORIA_ID = :id"; // Query para deletar um produto
    $stament = $pdo->prepare($sql); // Prepara a query
    $stament->bindParam(':id', $id, PDO::PARAM_INT); // Adiciona o parâmetro id
    $stament->execute(); // Executa a query
    header('Location: ../../views/index.php?page=categorias');
}
else{
    echo "Erro ao excluir a categoria";
}

require("../../database/database_config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    
    try {
        $sql = "DELETE FROM CATEGORIA WHERE CATEGORIA_ID = :id"; // Query para deletar um produto
        $stament = $pdo->prepare($sql); // Prepara a query
        $stament->bindParam(':id', $id, PDO::PARAM_INT); // Adiciona o parâmetro id
        $stament->execute(); // Executa a query
        header('Location: ../../views/index.php?page=categorias');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

?>