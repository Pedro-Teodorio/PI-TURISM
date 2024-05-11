<?php
function listarProdutos()
{
    require("../../utils/database/dbConnect.php");
    try {
        $stmt = $pdo->prepare(
            "SELECT
                produto.produto_id
              , produto.produto_nome
              , produto.produto_desc
              , produto.produto_preco
              , produto.produto_desconto
              , produto.produto_ativo
              , categoria.categoria_nome
              , GROUP_CONCAT( produto_imagem.imagem_url ) AS imagem_url
              , GROUP_CONCAT( produto_imagem.imagem_ordem ) AS imagem_ordem
              , COALESCE(produto_estoque.produto_qtd,0) AS produto_qtd
    
            FROM produto
    
                INNER JOIN categoria
                    USING(categoria_id)
                
                LEFT JOIN produto_imagem
                    USING(produto_id)
                
                LEFT JOIN produto_estoque
                    USING(produto_id)
            
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
                produto.produto_id
              , produto_imagem.imagem_ordem"
        );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return "<p style='color:red;'>Erro ao listar produtos: " . $e->getMessage() . "</p>";
    }
}