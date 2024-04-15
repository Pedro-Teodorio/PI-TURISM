<?php
session_start(); // Inicia a sessão
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
                <h4 class="mb-0">45</h4>
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
                <h4 class="mb-0">125</h4>
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
                <h4 class="mb-0">5</h4>
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
                <h4 class="mb-0">7</h4>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card mt-4 rounded-3">
        <div class="card-body">
          <table class="table table-hover text-center border ">
            <caption class="caption-top fs-5 text-black-50">
              Ultimos produtos adicionados
            </caption>
            <thead class="table-head-color">
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">Imagem</th>
              <th scope="col">Detalhes</th>
            </thead>
            <tbody>
              <tr class="vertical-align">
                <td>1</td>
                <td>Bolo</td>
                <td>Imagem de Bolo</td>
                <td>
                  <a href="#"><i class="lni lni-eye bg-color-logo text-light p-2 rounded-1 fs-3"></i></a>
                </td>
              </tr>
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