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
              , produto_imagem.imagem_url
              , produto_imagem.imagem_ordem
              , COALESCE(produto_estoque.produto_qtd,0) AS produto_qtd
    
            FROM produto
    
                INNER JOIN categoria
                    USING(categoria_id)
                
                LEFT JOIN produto_imagem
                    USING(produto_id)
                
                LEFT JOIN produto_estoque
                    USING(produto_id)
                    
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
