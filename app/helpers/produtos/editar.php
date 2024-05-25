<?php
require_once("../../database/database_config.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$ativo = isset($dados['ativo']) ? 1 : 0;
$imagem_ids = $dados['imagem_id'];
$imagem_urls = $dados['imagem_url'];
$imagem_ordens = $dados['imagem_ordem'];

$sql = "UPDATE PRODUTO
    LEFT JOIN PRODUTO_ESTOQUE
        USING(PRODUTO_ID)
    SET
    PRODUTO.PRODUTO_NOME = :nome
    , PRODUTO.PRODUTO_DESC = :descricao
    , PRODUTO.PRODUTO_PRECO = :preco
    , PRODUTO.PRODUTO_DESCONTO = :desconto
    , PRODUTO.PRODUTO_ATIVO = :ativo
    , PRODUTO.CATEGORIA_ID = :categoria
    , PRODUTO_ESTOQUE.PRODUTO_QTD = :quantidade
    WHERE PRODUTO.PRODUTO_ID = :id";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $dados["nome"], PDO::PARAM_STR);
    $stmt->bindParam(':descricao', $dados['descricao'], PDO::PARAM_STR);
    $stmt->bindParam(':preco', $dados['preco'], PDO::PARAM_STR);
    $stmt->bindParam(':desconto', $dados['desconto'], PDO::PARAM_STR);
    $stmt->bindParam(':ativo', $ativo, PDO::PARAM_INT);
    $stmt->bindParam(':categoria', $dados['categoria_id'], PDO::PARAM_STR);
    $stmt->bindParam(':quantidade', $dados["quantidade"], PDO::PARAM_INT);
    $stmt->bindParam(':id', $dados["id"], PDO::PARAM_INT);
    $stmt->execute();

    foreach ($imagem_urls as $index => $url) {
    $ordem = $imagem_ordens[$index];
    $ids = $imagem_ids[$index];
    $sql_imagem = "UPDATE PRODUTO_IMAGEM SET IMAGEM_URL = :url_imagem, IMAGEM_ORDEM = :ordem_imagem WHERE PRODUTO_ID = :id AND IMAGEM_ID = :imagem_id";
    $stmt_imagem = $pdo->prepare($sql_imagem);
    $stmt_imagem->bindParam(':url_imagem', $url, PDO::PARAM_STR);
    $stmt_imagem->bindParam(':ordem_imagem', $ordem, PDO::PARAM_INT);
    $stmt_imagem->bindParam(':id', $dados["id"], PDO::PARAM_INT);
    $stmt_imagem->bindParam(':imagem_id', $ids, PDO::PARAM_INT);
    $stmt_imagem->execute();
    }

    if ($stmt->rowCount() || $stmt_imagem->rowCount()) {
    $retorna = [
        'erro' => false, 'mensagem' => ' 
        <div class="alert alert-success alert-dismissible position-fixed bottom-0 end-0 m-4" role="alert">
            <div>
               Produto atualizado com sucesso!
            </div> 
            <button type="button" class="btn-close border-0 shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'
    ];
    } else {
    $retorna = [
        'erro' => true, 'mensagem' => ' 
        <div class="alert alert-success alert-dismissible" role="alert">
            <div>
              Erro ao atualizar produto!
            </div> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'
    ];
    }
    echo json_encode($retorna);
} catch (PDOException $e) {
    // Handle database errors
    echo json_encode(['erro' => true, 'mensagem' => 'Erro no banco de dados: ' . $e->getMessage()]);
}
