<?php 
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
    require_once("../../../utils/database/dbConnect.php");
    $sql = "SELECT * FROM categoria WHERE CATEGORIA_ID = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $categoria = $stmt->fetch(PDO::FETCH_ASSOC);

    $retorna = ["erro" => false, "dados" => $categoria];
}
else{
    $retorna = ["erro" => true, "mensagem" => "Erro: Categoria não encontrada!"];
}
echo json_encode($retorna);
?>