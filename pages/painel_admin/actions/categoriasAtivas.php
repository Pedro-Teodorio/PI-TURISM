<?php
function contadorDeCategoriasAtivas()
{
    require("../../utils/database/dbConnect.php");
    try {
        $stmt = $pdo->prepare(
            "SELECT
                COUNT( DISTINCT( CATEGORIA_ID ) ) AS categorias_ativas
            FROM CATEGORIA
            WHERE CATEGORIA_ATIVO = 1"
        );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return "<p style='color:red;'>Erro ao listar produtos: " . $e->getMessage() . "</p>";
    }
}