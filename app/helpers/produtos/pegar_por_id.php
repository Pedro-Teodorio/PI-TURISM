<?php 
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
    require("../../database/database_config.php");
    $sql = "SELECT * FROM PRODUTO WHERE PRODUTO_ID = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);
    $retorna = ["erro" => false, "dados" => $produto];
}
else{
    $retorna = ["erro" => true, "mensagem" => "Erro: Produto não encontrado!"];
}
echo json_encode($retorna);
?>