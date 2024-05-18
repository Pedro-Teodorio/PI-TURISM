<?php
$nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_URL);
if (!empty($nome)) {
    require("../../database/database_config.php");
    $query = "SELECT * FROM CATEGORIA WHERE CATEGORIA_ATIVO = 1 AND CATEGORIA_NOME LIKE ? ";
    $params = array("%$nome%");
    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    $categoria = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $retorna = ["erro" => false, "dados" => $categoria];
} else {
    require("../../database/database_config.php");
    $query = "SELECT * FROM CATEGORIA WHERE CATEGORIA_ATIVO = 1";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $categoria = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $retorna = ["erro" => false, "dados" => $categoria];
}
echo json_encode($retorna);
?>
