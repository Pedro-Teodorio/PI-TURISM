<?php 
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if (!empty($id)) {
    require("../../database/database_config.php");
        $stmt = $pdo->prepare(
            "SELECT
                    PRODUTO.PRODUTO_ID
                  , PRODUTO.PRODUTO_NOME
                  , PRODUTO.PRODUTO_DESC
                  , PRODUTO.PRODUTO_PRECO
                  , PRODUTO.PRODUTO_DESCONTO
                  , PRODUTO.PRODUTO_ATIVO
                  , CATEGORIA.CATEGORIA_ID
                  , CATEGORIA.CATEGORIA_NOME
                  , PRODUTO_IMAGEM.IMAGEM_ID
                  , PRODUTO_IMAGEM.IMAGEM_URL
                  , PRODUTO_IMAGEM.IMAGEM_ORDEM
                  , COALESCE(PRODUTO_ESTOQUE.PRODUTO_QTD,0) AS PRODUTO_QTD
        
                FROM PRODUTO
        
                    INNER JOIN CATEGORIA
                        USING(CATEGORIA_ID)
                    
                    LEFT JOIN PRODUTO_IMAGEM
                        USING(PRODUTO_ID)
                    
                    LEFT JOIN PRODUTO_ESTOQUE
                        USING(PRODUTO_ID)
                        
                     WHERE PRODUTO.PRODUTO_ID = :id
                  "
        );
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $retorna = ["erro" => false, "dados" => $produtos];
} else {
    $retorna = ["erro" => true, "mensagem" => "Erro: Categoria não encontrada!"];
}

echo json_encode($retorna);
?>