<?php 
require("../../database/database_config.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $desconto = $_POST['desconto'];
    $ativo = isset($_POST['ativo']) ? 1 : 0;
    $categoria = $_POST['categoria_id'];
    $quantidade = $_POST['quantidade'];

    $imagem_ids = $_POST['imagem_id'];
    $imagem_urls = $_POST['imagem_url'];
    $imagem_ordens = $_POST['imagem_ordem'];
    try {
        $stmt = $pdo->prepare(
            "UPDATE PRODUTO
                LEFT JOIN PRODUTO_ESTOQUE
                    USING(PRODUTO_ID)
            SET
                PRODUTO.PRODUTO_NOME = :nome
              , PRODUTO.PRODUTO_DESC = :descricao
              , PRODUTO.PRODUTO_PRECO = :preco
              , PRODUTO.PRODUTO_DESCONTO = :desconto
              , PRODUTO.PRODUTO_ATIVO = :ativo
              , PRODUTO.CATEGORIA_ID = :categoria
              , PRODUTO_ESTOQUE.PRODUTO_QTD = :quantidade
            WHERE PRODUTO.PRODUTO_ID = :id"
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
        $stmt->bindParam(':preco', $preco, PDO::PARAM_STR);
        $stmt->bindParam(':desconto', $desconto, PDO::PARAM_STR);
        $stmt->bindParam(':ativo', $ativo, PDO::PARAM_INT);
        $stmt->bindParam(':categoria', $categoria, PDO::PARAM_INT);
        $stmt->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);
        $stmt->execute();

        foreach ($imagem_urls as $index => $url) {
            $ordem = $imagem_ordens[$index];
            $ids = $imagem_ids[$index];
            $sql_imagem = "UPDATE PRODUTO_IMAGEM SET IMAGEM_URL = :url_imagem, IMAGEM_ORDEM = :ordem_imagem WHERE PRODUTO_ID = :id AND IMAGEM_ID = :imagem_id";
            $stmt_imagem = $pdo->prepare($sql_imagem);
            $stmt_imagem->bindParam(':url_imagem', $url, PDO::PARAM_STR);
            $stmt_imagem->bindParam(':ordem_imagem', $ordem, PDO::PARAM_INT);
            $stmt_imagem->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt_imagem->bindParam(':imagem_id', $ids, PDO::PARAM_INT);
            $stmt_imagem->execute();
        }

        header('Location: ../../views/index.php?page=produtos');
        exit();
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>