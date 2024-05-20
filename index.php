<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/images/image_login2.jpg" type="image/x-icon">
</head>

<body>
    <main class="container-fluid d-flex justify-content-center align-items-center w-100 vh-100">
        <div class="card mb-3 shadow border-0 rounded-5" style="max-width: 1024px;">
            <div class="row">
                <div class="col mt-4">
                    <img src="assets/images/image_login2.jpg" class="img-fluid  object-fit-cover " alt="..." style="min-width: 300px;width: 95%;">
                </div>
                <div class="col">
                    <form action="app/helpers/login/process_login.php" method="post" class="card-body card-login rounded-5 d-flex flex-column justify-items-center align-items-center w-100 h-100">
                        <i class="bi bi-person-circle fs-1 mb-4 mt-5 text-light"></i>
                        <h1 class="card-title fs-2 fw-bold mb-4 text-light">Login</h1>
                        <div class="mb-4 w-75 ">
                            <input name="admin_user" type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="mb-4 w-75 ">
                            <input name="admin_password" type="password" class="form-control" placeholder="Senha">
                        </div>
                        <div class="mb-4 w-75">
                            <button type="submit" class="btn btn-login w-100 text-light fw-bold">Entrar</button>
                        </div>
                        <?php
                        if (isset($_GET['error'])) {
                            echo "
                                    <div class='alert alert-danger alert-dismissible text-center w-75' role='alert'>
                                        <strong>Usuário ou Senha Inválidos</strong>
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>
                                    ";
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>