<?php 
 require("../../../utils/database/dbConnect.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $ativo = isset($_POST['ativo']) ? 1 : 0;
  
    try {
      $sql = "UPDATE categoria SET  CATEGORIA_NOME = :nome, CATEGORIA_DESC = :descricao, CATEGORIA_ATIVO = :ativo WHERE CATEGORIA_ID = :id";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':nome', $nome);
      $stmt->bindParam(':descricao', $descricao);
      $stmt->bindParam(':ativo', $ativo);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

?>