<?php 
 require("../../../utils/database/dbConnect.php");

try{
    $stmt_categoria = $pdo->prepare("SELECT * FROM CATEGORIA");
    $stmt_categoria->execute();
    $categorias = $stmt_categoria->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e){
    echo "<p style='color:red;'> Erro ao buscar categorias: " . $e->getMessage() . "</p>";
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $desconto = $_POST['desconto'];
    $ativo = isset($_POST['ativo']) ? 1 : 0;
    $categoria = $_POST['categoria'];
    $quantidade = $_POST['quantidade'];
    $imagem_id = $_POST['imagem_id'];
    $imagem_url = $_POST['imagem_url'];
    try {
        $stmt = $pdo -> prepare(
            "UPDATE PRODUTO
                LEFT JOIN PRODUTO_ESTOQUE
                    USING(PRODUTO_ID)
                LEFT JOIN PRODUTO_IMAGEM
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
        $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
        $stmt -> bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt -> bindParam(':descricao', $descricao, PDO::PARAM_STR);
        $stmt -> bindParam(':preco', $preco, PDO::PARAM_STR);
        $stmt -> bindParam(':desconto', $desconto, PDO::PARAM_STR);
        $stmt -> bindParam(':ativo', $ativo, PDO::PARAM_INT);
        $stmt -> bindParam(':categoria', $categoria, PDO::PARAM_INT);
        $stmt -> bindParam(':quantidade', $quantidade, PDO::PARAM_INT);
        $stmt -> execute();
        header('Location: ../index.php');
        exit();
    } catch(PDOException $e) {
        echo "Erro: " . $e -> getMessage();
    }
}
?>