<?php 
require_once("../../../utils/database/dbConnect.php");

if (!isset($_SESSION['admin_logado'])) { // Se a variável de sessão não existir, redireciona para a página de login
    header("Location: index.php"); // Redireciona para a página de login
    exit(); // Encerra o script
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $ativo = isset( $_POST['preco']) ? 1 : 0;

    try{
        $sql = "INSERT INTO categoria (CATEGORIA_NOME, CATEGORIA_DESC, CATEGORIA_ATIVO) VALUES (:nome, :descricao, :ativo)"; 
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':ativo', $ativo);
        $stmt->execute();
        echo "Categoria cadastrada com sucesso!";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>