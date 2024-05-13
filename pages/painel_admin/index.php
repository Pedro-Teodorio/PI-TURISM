<?php
session_start(); // Inicia a sessão
require_once("../../utils/database/dbConnect.php");
require_once("../categoria/actions/listar.php");
require_once("actions/listar.php");
require_once("actions/produtosAtivos.php");
require_once("actions/produtosEmEstoque.php");
require_once("actions/categoriasAtivas.php");
require_once("actions/administradoresAtivos.php");

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
  <title>Painel do administrador</title>
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div class="wrapper">
    <aside id="sidebar">
      <div class="d-flex">
        <button class="toggle-btn" type="button">
          <i class="lni lni-grid-alt"></i>
        </button>
        <div class="sidebar-logo">
          <a href="#">ECHO</a>
        </div>
      </div>
      <ul class="sidebar-nav">
        <!--
        <li class="sidebar-item">
          <a href="#" class="sidebar-link">
            <i class="lni lni-user"></i>
            <span>Perfil</span>
          </a>
        </li>
        -->
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
          <a href="../produtos/index.php" class="sidebar-link">
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
      <h1 class="fs-3">Painel do administrador</h1>

      <div class="row mt-4">
        <div class="col-sm-3">
          <div class="card rounded-3">
            <div class="card-body row d-flex justify-content-center align-items-center">
              <div class="col-1 me-5">
                <p class="card-text mb-0">
                  <i class="lni lni-checkmark bg-color-logo text-light p-2 rounded-circle fs-3"></i>
                </p>
              </div>
              <div class="col">
                <p class="card-text mb-0">
                  <strong>Produtos Ativos :</strong>
                </p>
                <?php foreach (contadorDeProdutosAtivos() as $ativo) { ?>
                  <h4 class="mb-0"><?= $ativo['produtos_ativos']; ?></h4>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="card rounded-3">
            <div class="card-body row d-flex justify-content-center align-items-center">
              <div class="col-1 me-5">
                <p class="card-text">
                  <i class="lni lni-archive bg-color-logo text-light p-2 rounded-circle fs-3"></i>
                </p>
              </div>
              <div class="col">
                <p class="card-text mb-0">
                  <strong>Produtos em estoque :</strong>
                </p>
                <?php foreach (contadorDeProdutosEmEstoque() as $estoque) { ?>
                  <h4 class="mb-0"><?= $estoque['produtos_em_estoque']; ?></h4>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="card rounded-3">
            <div class="card-body row d-flex justify-content-center align-items-center">
              <div class="col-1 me-5">
                <p class="card-text">
                  <i class="lni lni-notepad bg-color-logo text-light p-2 rounded-circle fs-3"></i>
                </p>
              </div>
              <div class="col">
                <p class="card-text mb-0">
                  <strong>Categorias Ativas :</strong>
                </p>
                <?php foreach (contadorDeCategoriasAtivas() as $categoria) { ?>
                  <h4 class="mb-0"><?= $categoria['categorias_ativas']; ?></h4>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="card rounded-3">
            <div class="card-body row d-flex justify-content-center align-items-center">
              <div class="col-1 me-5">
                <p class="card-text">
                  <i class="lni lni-users bg-color-logo text-light p-2 rounded-circle fs-2"></i>
                </p>
              </div>
              <div class="col">
                <p class="card-text mb-0">
                  <strong>Administradores Ativos :</strong>
                </p>
                <?php foreach (contadorDeAdministradoresAtivos() as $administrador) { ?>
                  <h4 class="mb-0"><?= $administrador['administradores_ativos']; ?></h4>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card mt-4 rounded-3">
        <div class="card-body">
          <table class="table table-hover text-center border ">
            <caption class="caption-top fs-5 text-black-50">
              10 produtos ativos com maior quantidade em estoque
            </caption>
            <thead class="table-head-color">
              <th scope="col">Ranking</th>
              <th scope="col">ID</th>
              <th scope="col">Nome</th>
              <th scope="col">Categoria</th>
              <th scope="col">Descrição</th>
              <th scope="col">Preço</th>
              <th scope="col">Quantidade</th>
            </thead>
            <tbody>
            <?php foreach (listarProdutosAltoEstoque() as $produto) { ?>
              <tr class="vertical-align">
                <td><?= $produto['ranking']; ?></td>
                <td><?= $produto['produto_id']; ?></td>
                <td><?= $produto['produto_nome']; ?></td>
                <td><?= $produto['categoria_nome']; ?></td>
                <td><?= $produto['produto_desc']; ?></td>
                <td><?= $produto['produto_preco']; ?></td>
                <td><?= $produto['produto_qtd']; ?></td>
              </tr>
              <!--
              <tr class="vertical-align">
                <td>2</td>
                <td>Pizza</td>
                <td>Imagem de Pizza</td>
                <td>
                  <a href="#"><i class="lni lni-eye bg-color-logo text-light p-2 rounded-1 fs-3"></i></a>
                </td>
              </tr>
              <tr class="vertical-align">
                <td>3</td>
                <td>Hambúrguer</td>
                <td>Imagem de Hambúrguer</td>
                <td>
                  <a href="#"><i class="lni lni-eye bg-color-logo text-light p-2 rounded-1 fs-3"></i></a>
                </td>
              </tr>
              <tr class="vertical-align">
                <td>4</td>
                <td>Sorvete</td>
                <td>Imagem de Sorvete</td>
                <td>
                  <a href="#"><i class="lni lni-eye bg-color-logo text-light p-2 rounded-1 fs-3"></i></a>
                </td>
              </tr>
              <tr class="vertical-align">
                <td>5</td>
                <td>Café</td>
                <td>Imagem de Café</td>
                <td>
                  <a href="#"><i class="lni lni-eye bg-color-logo text-light p-2 rounded-1 fs-3"></i></a>
                </td>
              </tr>
              -->
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="script.js"></script>
</body>

</html>