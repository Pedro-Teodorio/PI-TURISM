<?php
require("../../database/database_config.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $desconto = $_POST['desconto'];
    $categoria_id = $_POST['categoria_id'];
    $quantidade = $_POST['quantidade'];
    $ativo = isset($_POST['ativo']) ? 1 : 0;
    $imagem_urls = $_POST['imagem_url'];
    $imagem_ordens = $_POST['imagem_ordem'];

    try {
        $sql = "INSERT INTO PRODUTO(PRODUTO_NOME, PRODUTO_DESC, PRODUTO_PRECO, PRODUTO_DESCONTO, CATEGORIA_ID, PRODUTO_ATIVO) VALUES(:nome, :descricao, :preco, :desconto, :categoria_id, :ativo)";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
        $stmt->bindParam(':preco', $preco, PDO::PARAM_STR);
        $stmt->bindParam(':desconto', $desconto, PDO::PARAM_STR);
        $stmt->bindParam(':categoria_id', $categoria_id, PDO::PARAM_STR);
        $stmt->bindParam(':ativo', $ativo, PDO::PARAM_INT);
        $stmt->execute();

        // Pega o ID do último produto cadastrado
        $produto_id = $pdo->lastInsertID();

        // Insere imagens no banco de dados
        foreach ($imagem_urls as $index => $url) {
            $ordem = $imagem_ordens[$index];
            $sql_imagem = "INSERT INTO PRODUTO_IMAGEM(IMAGEM_URL, PRODUTO_ID, IMAGEM_ORDEM )VALUES(:url_imagem, :produto_id, :ordem_imagem)";
            $stmt_imagem = $pdo->prepare($sql_imagem);
            $stmt_imagem->bindParam(':url_imagem', $url, PDO::PARAM_STR);
            $stmt_imagem->bindParam(':produto_id', $produto_id, PDO::PARAM_INT);
            $stmt_imagem->bindParam(':ordem_imagem', $ordem, PDO::PARAM_INT);
            $stmt_imagem->execute();
        }

        $sql_quantidade = "INSERT INTO PRODUTO_ESTOQUE(PRODUTO_ID, PRODUTO_QTD) VALUES(:produto_id, :quantidade)";
        $stmt_quantidade = $pdo->prepare($sql_quantidade);
        $stmt_quantidade->bindParam(':produto_id', $produto_id, PDO::PARAM_INT);
        $stmt_quantidade->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);
        $stmt_quantidade->execute();

        header('Location: ../../views/index.php?page=produtos');
    } catch (PDOException $e) {
        echo "<p style='color:red'>Erro ao cadastrar o produto: " . $e->getMessage() . "</p>";
    }
}
