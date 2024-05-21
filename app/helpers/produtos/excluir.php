<?php
require("../../database/database_config.php");
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$id = $dados["id"];

try {
    $stmt_quantidade = $pdo->prepare("DELETE FROM PRODUTO_ESTOQUE WHERE PRODUTO_ID = :id");
    $stmt_quantidade->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt_quantidade->execute();

    $stmt_imagem = $pdo->prepare("DELETE FROM PRODUTO_IMAGEM WHERE PRODUTO_ID = :id");
    $stmt_imagem->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt_imagem->execute();

    $stmt = $pdo->prepare("DELETE FROM PRODUTO WHERE PRODUTO_ID = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount()) {
        $retorna = [
            'erro' => false, 'mensagem' => ' 
            <div class="alert alert-success alert-dismissible position-fixed bottom-0 end-0 m-4" role="alert">
                <div>
                   Produto deletado com sucesso!
                </div> 
                <button type="button" class="btn-close border-0 shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        ];
    } else {
        $retorna = [
            'erro' => true, 'mensagem' => ' 
            <div class="alert alert-success alert-dismissible" role="alert">
                <div>
                      Erro ao deletar produto!
                </div> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        ];
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

echo json_encode($retorna);
