<?php
session_start(); // Inicia a sessão
require_once("../../utils/database/dbConnect.php");
require_once("../categoria/actions/listar.php");
require_once("actions/listar.php"); // Inclui o arquivo de conexão com o banco de dados

if (!isset($_SESSION['admin_logado'])) { // Se a variável de sessão não existir, redireciona para a página de login
    header("Location: index.php"); // Redireciona para a página de login
    exit(); // Encerra o script
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Produtos</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css" />
</head>

<body id="corpo">
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="../painel_admin/index.php">ECHO</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Perfil</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="../administradores/index.php" class="sidebar-link">
                        <i class="lni lni-network"></i>
                        <span>Administradores</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="../categoria/index.php" class="sidebar-link">
                        <i class="lni lni-notepad bg-color-logo text-light"></i>
                        <span>Categorias</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-archive bg-color-logo text-light"></i>

                        <span>Produtos</span>
                    </a>
                </li>

            </ul>
            <div class="sidebar-footer">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <div class="main p-3 d-flex flex-column">
            <h1>Produtos</h1>

            <div class="card border-first">
                <div class="card-header bg-first">Buscar Produtos</div>
                <div class="card-body">
                    <div class="mb-2">
                        <label for="exampleFormControlInput1" class="form-label">Pesquisar</label>
                        <input type="text" class="form-control w-45" id="exampleFormControlInput1"
                            placeholder="Digite o nome do produto" />
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" />
                        <label class="form-check-label" for="inlineCheckbox1">Todos</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" />
                        <label class="form-check-label" for="inlineCheckbox2">Ativos</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" />
                        <label class="form-check-label" for="inlineCheckbox2">Inativos</label>
                    </div>

                    <a href="#" class="btn btn-success border-0">Buscar</a>

                </div>
            </div>

            <div class="card mt-4 rounded-3 border-first">
                <div class="card-header bg-first">Lista de Produtos</div>
                <div class="card-body">
                    <button type="button" class="btn btn-first-color mb-3 ps-2" data-bs-toggle="modal"
                        data-bs-target="#produtoModal">
                        <i class="bi bi-plus-lg "></i>
                        Nova
                    </button>
                    <table class="table table-hover text-center border">

                        <thead class="table-head-color">
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Preço</th>
                                <th>Categoria</th>
                                <th>Ativo</th>
                                <th>Desconto</th>
                                <th>Estoque</th>
                                <th>Imagem</th>
                                <th>Ordem</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach (listarProdutos() as $produto) { ?>
                            <tr>


                                <td><?= $produto['produto_id']; ?></td>
                                <td><?= $produto['produto_nome']; ?></td>
                                <td><?= $produto['produto_desc']; ?></td>
                                <td><?= $produto['produto_preco']; ?></td>
                                <td><?= $produto['categoria_nome']; ?></td>
                                <td>
                                    <?php
                                        if ($produto['produto_ativo'] == 1) {
                                            echo "<span class=' text-bg-success p-2 rounded-3'>Ativo</span>";
                                        } else {
                                            echo "<span class=' text-bg-danger p-2 rounded-3'>Inativo</span>";
                                        }
                                        ?>
                                </td>
                                <td><?= $produto['produto_desconto']; ?></td>
                                <td><?= $produto['produto_qtd']; ?></td>
                                <td><img src="<?php echo $produto['imagem_url']; ?>"
                                        alt="<?php echo $produto['produto_nome']; ?>" width="50"></td>
                                <td><?= $produto['imagem_ordem']; ?></td>
                                <td>
                                    <button data-bs-toggle="modal" data-bs-target="#produtoModalEdit"
                                        onclick="editarProduto(<?php echo $produto['produto_id']; ?>)"
                                        class="btn btn-first-color"><i class="bi bi-pencil-square"></i></button>
                                    <a href="actions/deletar.php?id=<?php echo $produto['produto_id'] ?>"
                                        class="btn btn-first-color"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade " id="produtoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-first">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Cadastrar Produto
                    </h5>
                </div>
                <div class="modal-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" id="myTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab1-tab" data-bs-toggle="tab" href="#tab1" role="tab"
                                aria-controls="tab1" aria-selected="true">Produto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#tab2" role="tab"
                                aria-controls="tab2" aria-selected="false">Imagens</a>
                        </li>
                        <!-- Add more tabs as needed -->
                    </ul>

                    <!-- Tab content -->
                    <form action="./actions/cadastrar.php" method="post">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                                <div class="mb-3 mt-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nome</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Digite o nome do produto" name="nome" />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                        name="descricao"></textarea>
                                </div>
                                <div class="mb-3 mt-3 row">
                                    <div class="col-6">
                                        <label for="exampleFormControlInput1" class="form-label">Preço</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Digite o preço" name="preco" />
                                    </div>
                                    <div class="col-6">
                                        <label for="exampleFormControlInput1" class="form-label">Desconto do
                                            produto</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Digite o desconto" name="desconto" step="0.01" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <label for="select_categoria" class="form-label">Categoria</label>
                                        <select class="form-select" aria-label="Default select example"
                                            id="select_categoria" name="categoria_id">
                                            <?php foreach (listarCategorias() as $categoria) { ?>
                                            <option value="<?= $categoria['CATEGORIA_ID'] ?>">
                                                <?= $categoria['CATEGORIA_NOME'] ?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                    <div class="col-6">
                                        <label for="exampleFormControlInput1" class="form-label">Quantidade de
                                            Produto</label>
                                        <input type="number" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Digite o desconto" name="quantidade" step="0.01" />
                                    </div>
                                </div>
                                <div class="mb-3"></div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Produto Ativo
                                        </label>
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                            name="ativo" />
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                                <div class="mb-3 mt-3">
                                    <label for="exampleFormControlInput1" class="form-label">URL Imagem</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Digite a URL da imagem" name="imagem_url[]" />
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="exampleFormControlInput1" class="form-label">Ordem da Imagem</label>
                                    <input type="number" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Digite a ordem da imagem" min="1" name="imagem_ordem[]" />
                                    <div class="container_images">

                                    </div>
                                    <div class="mb-3 mt-3">
                                        <button type="button" class="btn btn-primary"
                                            onclick="adicionarImages()">Adicionar Imagens</button>
                                    </div>
                                </div>

                            </div>
                            <!-- Add more tab content as needed -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn_close_modal" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>

    <div class="modal fade " id="produtoModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-first">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Editar Produto
                    </h5>
                </div>
                <div class="modal-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" id="myTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab1-tab" data-bs-toggle="tab" href="#tabEdit1" role="tab"
                                aria-controls="tab1" aria-selected="true">Produto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#tabEdit2" role="tab"
                                aria-controls="tab2" aria-selected="false">Imagens</a>
                        </li>
                        <!-- Add more tabs as needed -->
                    </ul>

                    <!-- Tab content -->
                    <form action="./actions/editar.php" method="post">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tabEdit1" role="tabpanel"
                                aria-labelledby="tab1-tab">
                                <div class="mb-3 mt-3">
                                <input type="text" class="form-control" id="editIdInput" placeholder="Digite o nome do produto" name="id"/>
                                    <label for="exampleFormControlInput1" class="form-label">Nome</label>
                                    <input type="text" class="form-control" id="editNameInput"
                                        placeholder="Digite o nome do produto" name="nome" />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
                                    <textarea class="form-control" rows="3" name="descricao"
                                        id="editDescInput"></textarea>
                                </div>
                                <div class=" mb-3 mt-3 row">
                                    <div class="col-6">
                                        <label for="exampleFormControlInput1" class="form-label">Preço</label>
                                        <input type="number" class="form-control" placeholder="Digite o preço"
                                            name="preco" id="editPrecoInput" step="0.01" />
                                    </div>
                                    <div class="col-6">
                                        <label for="exampleFormControlInput1" class="form-label">Desconto do
                                            produto</label>
                                        <input type="number" class="form-control" id="editDescontoInput"
                                            placeholder="Digite o desconto" name="desconto" step="0.01" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <label for="select_categoria" class="form-label">Categoria</label>
                                        <select class="form-select" aria-label="Default select example"
                                            id="select_categoria" name="categoria_id">
                                            <?php foreach (listarCategorias() as $categoria) { ?>
                                            <option value="<?= $categoria['CATEGORIA_ID'] ?>">
                                                <?= $categoria['CATEGORIA_NOME'] ?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                    <div class="col-6">
                                        <label for="exampleFormControlInput1" class="form-label">Quantidade de
                                            Produto</label>
                                        <input type="number" class="form-control" id="editQuantidadeInput"
                                            placeholder="Digite o desconto" name="quantidade" />
                                    </div>
                                </div>
                                <div class="mb-3"></div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Produto Ativo
                                        </label>
                                        <input class="form-check-input" type="checkbox" id="editCheck" name="ativo" />
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade tab-images" id="tabEdit2" role="tabpanel"
                                aria-labelledby="tab2-tab">


                            </div>
                            <!-- Add more tab content as needed -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn_close_modal_edit" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="script.js"></script>
</body>

</html>