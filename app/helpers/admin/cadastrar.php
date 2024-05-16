<?php
require("../../database/database_config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $ativo = isset($_POST['ativo']) ? 1 : 0;

    try {
        $sql = "INSERT INTO administrador (ADM_NOME, ADM_SENHA, ADM_EMAIL, ADM_ATIVO ) VALUES (:nome, :senha, :email ,:ativo)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':ativo', $ativo, PDO::PARAM_INT);
        $stmt->execute();
        header('Location: ../../views/index.php?page=admins');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
