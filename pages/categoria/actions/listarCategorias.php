<?php
function listarCategorias()
{
    require("../../utils/database/dbConnect.php"); // Inclui o arquivo de conexão com o banco de dados
    $sql = "SELECT * FROM categoria"; // Query para selecionar todos os produtos
    $stament = $pdo->prepare($sql); // Prepara a query
    $stament->execute(); // Executa a query

    return $stament->fetchAll(); // Retorna todos os produtos
}
