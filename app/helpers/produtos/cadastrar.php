<?php
require("../../database/database_config.php");
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$ativo = isset($dados['ativo']) ? 1 : 0;
$imagem_urls = $dados['imagem_url'];
$imagem_ordens = $dados['imagem_ordem'];

$sql = "INSERT INTO PRODUTO(PRODUTO_NOME, PRODUTO_DESC, PRODUTO_PRECO, PRODUTO_DESCONTO, CATEGORIA_ID, PRODUTO_ATIVO) VALUES(:nome, :descricao, :preco, :desconto, :categoria_id, :ativo)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':nome', $dados["nome"], PDO::PARAM_STR);
$stmt->bindParam(':descricao', $dados['descricao'], PDO::PARAM_STR);
$stmt->bindParam(':preco', $dados['preco'], PDO::PARAM_STR);
$stmt->bindParam(':desconto', $dados['desconto'], PDO::PARAM_STR);
$stmt->bindParam(':categoria_id', $dados['categoria_id'], PDO::PARAM_STR);
$stmt->bindParam(':ativo', $ativo, PDO::PARAM_INT);
$stmt->execute();
// Pega o ID do último produto cadastrado
$produto_id = $pdo->lastInsertID();

foreach ($imagem_urls as $index => $url) {
    $ordem = $imagem_ordens[$index];
    $sql_imagem = "INSERT INTO PRODUTO_IMAGEM(IMAGEM_URL, PRODUTO_ID, IMAGEM_ORDEM )VALUES(:url_imagem, :produto_id, :ordem_imagem)";
    $stmt_imagem = $pdo->prepare($sql_imagem);
    $stmt_imagem->bindParam(':url_imagem', $url, PDO::PARAM_STR);
    $stmt_imagem->bindParam(':produto_id', $produto_id, PDO::PARAM_INT);
    $stmt_imagem->bindParam(':ordem_imagem', $ordem, PDO::PARAM_INT);
    $stmt_imagem->execute();
}

$sql_quantidade = "INSERT INTO PRODUTO_ESTOQUE(PRODUTO_ID, PRODUTO_QTD) VALUES(:produto_id, :quantidade)";
$stmt_quantidade = $pdo->prepare($sql_quantidade);
$stmt_quantidade->bindParam(':produto_id', $produto_id, PDO::PARAM_INT);
$stmt_quantidade->bindParam(':quantidade', $dados["quantidade"], PDO::PARAM_INT);
$stmt_quantidade->execute();

if ($stmt->rowCount()) {
    $retorna = [
        'erro' => false, 'mensagem' => ' 
            <div class="alert alert-success alert-dismissible position-fixed bottom-0 end-0 m-4" role="alert">
                <div>
                   Produto cadastrado com sucesso!
                </div> 
                <button type="button" class="btn-close border-0 shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
    ];
} else {
    $retorna = [
        'erro' => true, 'mensagem' => ' 
            <div class="alert alert-success alert-dismissible" role="alert">
                <div>
                      Erro ao cadastrar produto!
                </div> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
    ];
}
echo json_encode($retorna);
?>