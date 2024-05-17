<?php 

if(!empty($id)){
    $id = $_GET['id'];
    require("../../database/database_config.php");
    $sql = "DELETE FROM ADMINISTRADOR WHERE ADM_ID = :id"; // Query para deletar um produto
    $stament = $pdo->prepare($sql); // Prepara a query
    $stament->bindParam(':id', $id, PDO::PARAM_INT); // Adiciona o parâmetro id
    $stament->execute(); // Executa a query
    header('Location: ../../views/index.php?page=admins');
}
else{
    echo "Erro ao excluir o administrador";
}

require("../../database/database_config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    
    try {
        $sql = "DELETE FROM administrador WHERE ADM_ID = :id"; // Query para deletar um produto
        $stament = $pdo->prepare($sql); // Prepara a query
        $stament->bindParam(':id', $id, PDO::PARAM_INT); // Adiciona o parâmetro id
        $stament->execute(); // Executa a query
        header('Location: ../../views/index.php?page=admins');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

?>