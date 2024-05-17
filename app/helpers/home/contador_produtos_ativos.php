<?php
function contadorDeProdutosAtivos()
{
    require("../database/database_config.php");
    try {
        $stmt = $pdo->prepare(
            "SELECT
                COUNT( DISTINCT( produto.produto_id ) ) AS produtos_ativos
            FROM produto
            WHERE produto.produto_ativo = 1"
        );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return "<p style='color:red;'>Erro ao listar produtos: " . $e->getMessage() . "</p>";
    }
}
