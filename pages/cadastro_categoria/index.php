<?php 
session_start(); // Inicia a sessão
require_once("../../utils/database/dbConnect.php"); // Inclui o arquivo de conexão com o banco de dados

if (!isset($_SESSION['admin_logado'])) { // Se a variável de sessão não existir, redireciona para a página de login
    header("Location: index.php"); // Redireciona para a página de login
    exit(); // Encerra o script
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Categoria</title>
</head>
<body>
    <h1>Cadastro Categoria</h1>
</body>
</html>