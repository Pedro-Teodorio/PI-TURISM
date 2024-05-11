<?php
function contadorDeCategoriasAtivas()
{
    require("../../utils/database/dbConnect.php");
    try {
        $stmt = $pdo->prepare(
            "SELECT
                COUNT( DISTINCT( categoria_id ) ) AS categorias_ativas

            FROM produto

                INNER JOIN categoria
                    USING(categoria_id)
                
            WHERE produto.produto_ativo = 1"
        );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return "<p style='color:red;'>Erro ao listar produtos: " . $e->getMessage() . "</p>";
    }
}