<?php
function contadorDeProdutosAtivos()
{
    require("../database/database_config.php");
    try {
        $stmt = $pdo->prepare(
            "SELECT
                COUNT( DISTINCT( PRODUTO.PRODUTO_ID ) ) AS produtos_ativos
            FROM PRODUTO
            WHERE PRODUTO.PRODUTO_ATIVO = 1"
        );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return "<p style='color:red;'>Erro ao listar produtos: " . $e->getMessage() . "</p>";
    }
}
