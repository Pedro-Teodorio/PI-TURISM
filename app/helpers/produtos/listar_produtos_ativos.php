<?php
try {
    require("../../database/database_config.php");
    $stmt = $pdo->prepare(
        "SELECT
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
    
            FROM produto
    
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
              , PRODUTO_IMAGEM.IMAGEM_ORDEM;
              
              "
    );
    $stmt->execute();
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $retorna = ["erro" => false, "dados" => $produtos];
} catch (PDOException $e) {
    $retorna = ["erro" => true, "mensagem" => "Erro: " . $e->getMessage()];
}

echo json_encode($retorna);
