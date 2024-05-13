<?php
function contadorDeProdutosEmEstoque()
{
    require("../../utils/database/dbConnect.php");
    try {
        $stmt = $pdo->prepare(
            "SELECT
                SUM( COALESCE(produto_estoque.produto_qtd,0) ) AS produtos_em_estoque

            FROM produto
                
                LEFT JOIN produto_estoque
                    USING(produto_id)
                
            WHERE produto.produto_ativo = 1"
        );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return "<p style='color:red;'>Erro ao listar produtos: " . $e->getMessage() . "</p>";
    }
}