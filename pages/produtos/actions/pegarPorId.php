<?php
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if (!empty($id)) {
    require("../../../utils/database/dbConnect.php");
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
                        
                     WHERE produto.produto_id = :id
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