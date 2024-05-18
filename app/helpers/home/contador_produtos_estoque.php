<?php

function contadorDeProdutosEmEstoque()
{
    require("../database/database_config.php");
    try {
        $stmt = $pdo->prepare(
            "SELECT
                SUM( COALESCE(PRODUTO_ESTOQUE.PRODUTO_QTD,0) ) AS produtos_em_estoque

            FROM PRODUTO
                
                LEFT JOIN PRODUTO_ESTOQUE
                    USING(PRODUTO_ID)
                
            WHERE PRODUTO.PRODUTO_ATIVO = 1"
        );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return "<p style='color:red;'>Erro ao listar produtos: " . $e->getMessage() . "</p>";
    }
}
