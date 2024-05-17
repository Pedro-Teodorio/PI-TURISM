<?php
session_start();
if (!isset($_SESSION['admin_logado'])) { // Se a variável de sessão não existir, redireciona para a página de login
    header("Location: ../../index.php"); // Redireciona para a página de login
    exit(); // Encerra o script
}

$page = 'home';
if (isset($_GET['page'])) {
    $page = addslashes($_GET['page']);
}


include('./content/header.php');

switch ($page) {
    case 'home':
        include('./content/home.php');
        break;
    case 'admins':
        include('./content/admins.php');
        break;
    case 'categorias':
        include('./content/categorias.php');
        break;
    case 'produtos':
        include('./content/produtos.php');
        break;
    default:
        include('./content/home.php');
        break;
}


include('./content/footer.php');

?>