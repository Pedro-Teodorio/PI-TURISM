<?php
session_start(); // Inicia a sessão
require_once("../../utils/database/dbConnect.php");
require_once("actions/listarCategorias.php"); // Inclui o arquivo de conexão com o banco de dados

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
  <title>Categorias</title>
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
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
          <a href="#" class="sidebar-link">
            <i class="lni lni-network"></i>
            <span>Administradores</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="#" class="sidebar-link">
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
      <h1>Categorias</h1>

      <div class="card border-first">
        <div class="card-header bg-first">Buscar Categorias</div>
        <div class="card-body">
          <div class="mb-2">
            <label for="exampleFormControlInput1" class="form-label">Pesquisar</label>
            <input type="text" class="form-control w-45" id="exampleFormControlInput1" placeholder="Digite o nome da categoria" />
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
        <div class="card-header bg-first">Lista de Categorias</div>
        <div class="card-body">
          <button type="button" class="btn btn-first-color mb-3 ps-2" data-bs-toggle="modal" data-bs-target="#categoriaModal">
            <i class="bi bi-plus-lg "></i>
            Nova
          </button>
          <table class="table table-hover text-center border">

            <thead class="table-head-color">
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">Descrição</th>
              <th scope="col">Ativo</th>
              <th scope="col">Ações</th>
            </thead>
            <tbody>

              <?php foreach (listarCategorias() as $categoria) { ?>
                <tr class="vertical-align text-center">
                  <td><?php echo $categoria['CATEGORIA_ID']; ?></td>
                  <td><?php echo $categoria['CATEGORIA_NOME']; ?></td>
                  <td><?php echo $categoria['CATEGORIA_DESC']; ?></td>
                  <td><?php
                      if ($categoria['CATEGORIA_ATIVO'] == 1) {
                        echo "<span class=' text-bg-success p-2 rounded-3'>Ativo</span>";
                      } else {
                        echo "<span class=' text-bg-danger p-2 rounded-3'>Inativo</span>";
                      }
                      ?>
                  </td>
                  <td>
                    <button data-bs-toggle="modal" data-bs-target="#categoriaModalEdit" onclick="editarCategoria(<?php echo $categoria['CATEGORIA_ID']; ?>)" class="btn btn-first-color"><i class="bi bi-pencil-square"></i></button>
                    <a href="actions/deletarCategoria.php?id=<?php echo $categoria['CATEGORIA_ID']; ?>" class="btn btn-first-color"><i class="bi bi-trash"></i></a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="categoriaModal" tabindex="-1" aria-labelledby="categoriaModalLabel" aria-hidden="true">
    <div class=" modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-first">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar Categoria</h1>
        </div>
        <div class="modal-body">
          <form action="actions/cadastrarCategoria.php" method="post">
            <div class="modal-body">
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nome</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Digite o nome do produto" name="nome" required>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descricao" required></textarea>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="ativo" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Categoria Ativa
                </label>
              </div>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
              <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="categoriaModalEdit" tabindex="-1" aria-labelledby="categoriaModalEditLabel" aria-hidden="true">
    <div class=" modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-first">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Categoria</h1>
        </div>
        <div class="modal-body">
          <form action="actions/editarCategoria.php" method="post">
            <div class="modal-body">
              <div class="mb-3">

                <input type="text" class="form-control" id="editIdInput" placeholder="Digite o nome do produto" name="id" hidden>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nome</label>
                <input type="text" class="form-control" id="editNameInput" placeholder="Digite o nome do produto" name="nome" required>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
                <textarea class="form-control" id="editDescInput" rows="3" name="descricao" required></textarea>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="ativo" id="editCheck">
                <label class="form-check-label" for="flexCheckDefault">
                  Categoria Ativa
                </label>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
              <button type="submit" class="btn btn-success">Editar</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="script.js"></script>
</body>

</html>