<?php
require("../../database/database_config.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$sql = "UPDATE CATEGORIA SET CATEGORIA_NOME = :nome, CATEGORIA_DESC = :descricao, CATEGORIA_ATIVO = :ativo WHERE CATEGORIA_ID = :id";

$ativo = isset($dados['ativo']) ? 1 : 0;
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':nome', $dados["nome"], PDO::PARAM_STR);
$stmt->bindParam(':descricao', $dados["descricao"], PDO::PARAM_STR);
$stmt->bindParam(':ativo', $ativo, PDO::PARAM_INT);
$stmt->bindParam(':id', $dados["id"], PDO::PARAM_INT);
$stmt->execute();

if ($stmt->rowCount()) {
    $retorna = ['erro' => false, 'mensagem' => ' 
    <div class="alert alert-success alert-dismissible position-fixed bottom-0 end-0 m-4" role="alert">
        <div>
           Categoria editada com sucesso!
        </div> 
        <button type="button" class="btn-close border-0 shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'
];
} else {
    $retorna = ['erro' => true, 'mensagem' => ' 
    <div class="alert alert-danger alert-dismissible" role="alert">
        <div>
              Erro ao editar categoria!
        </div> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>'
];
}
echo json_encode($retorna);