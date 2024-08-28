<?php
// Inicia a sessão
session_start();

// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Verifica se os campos 'login' e 'password' existem no array $_POST
    if (isset($_POST['login']) && isset($_POST['password'])) {
        
        // Valida o login e a senha
        if ($_POST['login'] == "admin" && $_POST['password'] == "senha") {
            // Redireciona para a página de destino
            header('Location: http://localhost/crud_receita/blog/dashboard.php');
            exit();
        } else {
            // Exibe uma mensagem de erro
            $error_message = "Login ou senha inválidos!";
        }
    } else {
        // Exibe uma mensagem de erro caso os campos estejam faltando
        $error_message = "Por favor, preencha todos os campos!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body>
<div class="text-center mt-3">
    <img src="logo.png" alt="Logo" class="img-fluid" style="max-width: 100px;">
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse justify-content-center">
        <div class="navbar-nav gap-3">
            <a class="nav-item nav-link fs-4" href="http://localhost/crud_receita/blog/homepage.php">Receitas</a>
            <a class="nav-item nav-link fs-4" href="http://localhost/crud_receita/blog/about.php">Sobre</a>
            <a class="nav-item nav-link fs-4" href="http://localhost/crud_receita/blog/contato.php">Contato</a>
            <a class="nav-item nav-link fs-4" href="http://localhost/crud_receita/blog/login.php">Login</a>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="text-center mb-4">Login</h3>
                    <?php if(isset($error_message)): ?>
                        <div class="alert alert-danger"><?php echo $error_message; ?></div>
                    <?php endif; ?>
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="login" class="form-label">Login</label>
                            <input type="text" class="form-control" id="login" name="login" placeholder="Digite seu login">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha">
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-info">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
