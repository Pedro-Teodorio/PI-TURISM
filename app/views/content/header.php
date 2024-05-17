<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do administrador</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/style.css" />
</head>

<body>
    <header>
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="?page=home" class="sidebar-href">ECHO</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a  href="?page=home" class="sidebar-link sidebar-href">
                        <i class="lni lni-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a id="link_admin" href="?page=admins" class="sidebar-link sidebar-href">
                        <i class="lni lni-network"></i>
                        <span>Administradores</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="?page=categorias" class="sidebar-link sidebar-href">
                        <i class="lni lni-notepad bg-color-logo text-light"></i>
                        <span>Categorias</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="?page=produtos" class="sidebar-link sidebar-href">
                        <i class="lni lni-archive bg-color-logo text-light"></i>

                        <span>Produtos</span>
                    </a>
                </li>

            </ul>
            <div class="sidebar-footer">
                <a href="../helpers/login/logout.php" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
    </header>