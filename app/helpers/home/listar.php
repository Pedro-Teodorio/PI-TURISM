<?php 
function listarProdutosAltoEstoque()
{
    require("../database/database_config.php");
    try {
        $stmt = $pdo->prepare(
            "SELECT
                ROW_NUMBER() OVER(ORDER BY COALESCE(PRODUTO_ESTOQUE.PRODUTO_QTD,0) DESC ) AS ranking
              , PRODUTO.PRODUTO_ID
              , PRODUTO.PRODUTO_NOME
              , PRODUTO.PRODUTO_DESC
              , CATEGORIA.CATEGORIA_NOME
              , PRODUTO.PRODUTO_PRECO
              , COALESCE(PRODUTO_ESTOQUE.PRODUTO_QTD,0) AS produto_qtd
    
            FROM PRODUTO
    
                INNER JOIN CATEGORIA
                    USING(CATEGORIA_ID)
                
                LEFT JOIN PRODUTO_ESTOQUE
                    USING(PRODUTO_ID)
                
            WHERE PRODUTO.PRODUTO_ATIVO = 1
                    
            ORDER BY
                1
            
            LIMIT 10"
        );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return "<p style='color:red;'>Erro ao listar produtos: " . $e->getMessage() . "</p>";
    }
}
?>