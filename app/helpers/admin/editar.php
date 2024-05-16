<?php
require("../../database/database_config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $ativo = isset($_POST['ativo']) ? 1 : 0;

    try {
        $sql = "UPDATE ADMINISTRADOR SET  ADM_NOME = :nome, ADM_SENHA = :senha, ADM_EMAIL = :email ,  ADM_ATIVO = :ativo WHERE ADM_ID = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':ativo', $ativo, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        header('Location: ../../views/index.php?page=admins');
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
}
