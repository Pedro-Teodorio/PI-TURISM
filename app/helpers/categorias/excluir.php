<?php
require("../../database/database_config.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$stmt_produto = $pdo->prepare(
    "UPDATE PRODUTO
    SET CATEGORIA_ID = 9
    WHERE CATEGORIA_ID = :id"
);

$stmt_produto->bindParam(':id', $dados["id"], PDO::PARAM_INT);
$stmt_produto->execute();

$sql =  "DELETE
        FROM CATEGORIA
        WHERE CATEGORIA_ID = :id";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $dados["id"], PDO::PARAM_INT);
$stmt->execute();

if ($stmt->rowCount()) {
    $retorna = [
        'erro' => false, 'mensagem' => ' 
    <div class="alert alert-success alert-dismissible position-fixed bottom-0 end-0 m-4" role="alert">
        <div>
            Categoria deletada com sucesso!
        </div> 
        <button type="button" class="btn-close border-0 shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'
    ];
} else {
    $retorna = [
        'erro' => true, 'mensagem' => ' 
    <div class="alert alert-success alert-dismissible" role="alert">
        <div>
              Erro ao deletar categoria!
        </div> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'
    ];
}
echo json_encode($retorna);
