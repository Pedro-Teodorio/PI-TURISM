<?php
try {
    require("../../database/database_config.php");
    $sql = "
        SELECT
            PRODUTO.PRODUTO_ID
          , PRODUTO.PRODUTO_NOME
          , PRODUTO.PRODUTO_DESC
          , PRODUTO.PRODUTO_PRECO
          , PRODUTO.PRODUTO_DESCONTO
          , CATEGORIA.CATEGORIA_NOME
          , PRODUTO.PRODUTO_ATIVO
          , PRODUTO_ESTOQUE.PRODUTO_QTD
          , PRODUTO_IMAGEM.IMAGEM_URL
          , PRODUTO_IMAGEM.IMAGEM_ORDEM

        FROM PRODUTO

            INNER JOIN CATEGORIA
                USING(CATEGORIA_ID)
            
            INNER JOIN PRODUTO_ESTOQUE
                USING(PRODUTO_ID)
            
            INNER JOIN PRODUTO_IMAGEM
                USING(PRODUTO_ID)

        ORDER BY
            PRODUTO.PRODUTO_ID
          , PRODUTO_IMAGEM.IMAGEM_ORDEM
    ";
    $stament = $pdo->prepare($sql); // Prepara a query
    $stament->execute(); // Executa a query
    $produto = $stament->fetchAll();
    $retorna = ["erro" => false, "dados" => $produto];
} catch (PDOException $e) {
    $retorna = ["erro" => true, "mensagem" => "Erro: " . $e->getMessage()];
}
echo json_encode($retorna);
