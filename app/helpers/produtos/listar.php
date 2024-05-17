<?php
try {
    require("../../database/database_config.php");
    $sql = "SELECT * FROM PRODUTO";
    $stament = $pdo->prepare($sql); // Prepara a query
    $stament->execute(); // Executa a query
    $categoria = $stament->fetchAll();
    $retorna = ["erro" => false, "dados" => $categoria];
} catch (PDOException $e) {
    $retorna = ["erro" => true, "mensagem" => "Erro: " . $e->getMessage()];
}
echo json_encode($retorna);