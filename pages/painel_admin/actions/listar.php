<?php
function listarProdutosAltoEstoque()
{
    require("../../utils/database/dbConnect.php");
    try {
        $stmt = $pdo->prepare(
            "SELECT
                ROW_NUMBER() OVER(ORDER BY COALESCE(produto_estoque.produto_qtd,0) DESC ) AS ranking
              , produto.produto_id
              , produto.produto_nome
              , produto.produto_desc
              , categoria.categoria_nome
              , produto.produto_preco
              , COALESCE(produto_estoque.produto_qtd,0) AS produto_qtd
    
            FROM produto
    
                INNER JOIN categoria
                    USING(categoria_id)
                
                LEFT JOIN produto_estoque
                    USING(produto_id)
                
            WHERE produto.produto_ativo = 1
                    
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