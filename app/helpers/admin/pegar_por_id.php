<?php 
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
    require("../../database/database_config.php");
    $sql = "SELECT * FROM administrador WHERE ADM_ID = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);
    $retorna = ["erro" => false, "dados" => $admin];
}
else{
    $retorna = ["erro" => true, "mensagem" => "Erro: Administrador não encontrada!"];
}
echo json_encode($retorna);
?>