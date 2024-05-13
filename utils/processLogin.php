<?php
session_start(); // Inicia a sessão
require_once "./database/dbConnect.php"; // Inclui o arquivo de conexão com o banco de dados   

$admin_user = $_POST['admin_user']; // Recebe o usuário do formulário
$admin_password = $_POST['admin_password']; // Recebe a senha do formulário

// Query para buscar o usuário e senha no banco de dados
$sql = "SELECT * FROM administrador WHERE ADM_EMAIL = :admin_user AND ADM_SENHA = :admin_password AND ADM_ATIVO = 1";

$query = $pdo->prepare($sql); // Prepara a query
$query->bindParam(':admin_user', $admin_user, PDO::PARAM_STR); // Substitui o parâmetro :admin_user pelo valor de $admin_user
$query->bindParam(':admin_password', $admin_password, PDO::PARAM_STR); // Substitui o parâmetro :admin_password pelo valor de $admin_password
$query->execute(); // Executa a query

if ($query->rowCount() == 1) { // Se a query retornar 1 linha, significa que o usuário e senha estão corretos
    $_SESSION['admin_logado'] =  true; // Cria uma variável de sessão para indicar que o usuário está logado
    header("Location: ../pages/painel_admin/index.php"); // Redireciona para a página do painel do administrador
} else {
    header("Location: ../index.php?error"); // Redireciona para a página de login com uma mensagem de erro
}
