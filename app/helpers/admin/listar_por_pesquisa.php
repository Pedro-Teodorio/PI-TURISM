<?php
$nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_URL);
if (!empty($nome)) {
    require("../../database/database_config.php");
    $query = "SELECT * FROM administrador WHERE ADM_ATIVO = 1 AND ADM_NOME LIKE ? ";
    $params = array("%$nome%");
    $stmt = $pdo->prepare($query);
    $stmt->execute($params);

    $admin = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $retorna = ["erro" => false, "dados" => $admin];
} else {
    $retorna = ["erro" => true, "mensagem" => "Erro: Administrador não encontrado!"];
}
echo json_encode($retorna);
?>
