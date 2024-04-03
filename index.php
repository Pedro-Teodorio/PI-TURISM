<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <section id="card_login">
        <div id="card_img">
            <img src="./imgs/image_login2.jpg" alt="">
        </div>
        <div id="card_form">
            <form action="./utils/processLogin.php" method="post">
                <i class="bi bi-person-circle icon_login"></i>
                <h1>Login</h1>
                <input type="text" name="admin_user" placeholder="Usuário" required>
                <input type="password" name="admin_password" placeholder="Senha" required>
                <button id="btn_login" type="submit">Entrar</button>
                <?php
                if (isset($_GET['error'])) {
                    echo "
                    <div class='alert alert-danger alert-dismissible text-center' role='alert'>
                        <strong>Usuário ou Senha Inválidos</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                    ";
                }
                ?>
            </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>