<?php
try {
    require("../../database/database_config.php");
    $sql = "SELECT * FROM ADMINISTRADOR ";
    $stament = $pdo->prepare($sql); // Prepara a query
    $stament->execute(); // Executa a query
    $admins = $stament->fetchAll();
    $retorna = ["erro" => false, "dados" => $admins];
} catch (PDOException $e) {
    $retorna = ["erro" => true, "mensagem" => "Erro: " . $e->getMessage()];
}
echo json_encode($retorna);
