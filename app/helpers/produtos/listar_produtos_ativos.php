<?php
$nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_URL);
if (!empty($nome)) {
    require("../../database/database_config.php");
    $query = "
        SELECT
            PRODUTO.PRODUTO_ID
          , PRODUTO.PRODUTO_NOME
          , PRODUTO.PRODUTO_DESC
          , PRODUTO.PRODUTO_PRECO
          , PRODUTO.PRODUTO_DESCONTO
          , PRODUTO.PRODUTO_ATIVO
          , CATEGORIA.CATEGORIA_NOME
          , GROUP_CONCAT( PRODUTO_IMAGEM.IMAGEM_URL ) AS IMAGEM_URL
          , GROUP_CONCAT( PRODUTO_IMAGEM.IMAGEM_ORDEM ) AS IMAGEM_ORDEM
          , COALESCE(PRODUTO_ESTOQUE.PRODUTO_QTD,0) AS PRODUTO_QTD

        FROM PRODUTO

            INNER JOIN CATEGORIA
                USING(CATEGORIA_ID)
            
            LEFT JOIN PRODUTO_IMAGEM
                USING(PRODUTO_ID)
            
            LEFT JOIN PRODUTO_ESTOQUE
                USING(PRODUTO_ID)
            
        WHERE PRODUTO.PRODUTO_ATIVO = 1
            AND PRODUTO.PRODUTO_NOME LIKE ?

        GROUP BY
            1
          , 2
          , 3
          , 4
          , 5
          , 6
          , 7
          , 10
                
        ORDER BY
            PRODUTO.PRODUTO_ID
          , PRODUTO_IMAGEM.IMAGEM_ORDEM
    ";
    $params = array("%$nome%");
    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    $produto = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $retorna = ["erro" => false, "dados" => $produto];
} else {
    require("../../database/database_config.php");
    $query = "
        SELECT
            PRODUTO.PRODUTO_ID
            , PRODUTO.PRODUTO_NOME
            , PRODUTO.PRODUTO_DESC
            , PRODUTO.PRODUTO_PRECO
            , PRODUTO.PRODUTO_DESCONTO
            , PRODUTO.PRODUTO_ATIVO
            , CATEGORIA.CATEGORIA_NOME
            , GROUP_CONCAT( PRODUTO_IMAGEM.IMAGEM_URL ) AS IMAGEM_URL
            , GROUP_CONCAT( PRODUTO_IMAGEM.IMAGEM_ORDEM ) AS IMAGEM_ORDEM
            , COALESCE(PRODUTO_ESTOQUE.PRODUTO_QTD,0) AS PRODUTO_QTD

        FROM PRODUTO

            INNER JOIN CATEGORIA
                USING(CATEGORIA_ID)
            
            LEFT JOIN PRODUTO_IMAGEM
                USING(PRODUTO_ID)
            
            LEFT JOIN PRODUTO_ESTOQUE
                USING(PRODUTO_ID)
            
        WHERE PRODUTO.PRODUTO_ATIVO = 1
        
        GROUP BY
            1
            , 2
            , 3
            , 4
            , 5
            , 6
            , 7
            , 10
                
        ORDER BY
            PRODUTO.PRODUTO_ID
            , PRODUTO_IMAGEM.IMAGEM_ORDEM
    ";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $produto = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $retorna = ["erro" => false, "dados" => $produto];
}
echo json_encode($retorna);
?>