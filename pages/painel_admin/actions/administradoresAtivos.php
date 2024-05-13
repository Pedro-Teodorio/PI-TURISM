<?php
function contadorDeAdministradoresAtivos()
{
    require("../../utils/database/dbConnect.php");
    try {
        $stmt = $pdo->prepare(
            "SELECT
                COUNT( DISTINCT( ADM_ID ) ) AS administradores_ativos
            FROM ADMINISTRADOR
            WHERE ADM_ATIVO = 1"
        );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return "<p style='color:red;'>Erro ao listar produtos: " . $e->getMessage() . "</p>";
    }
}