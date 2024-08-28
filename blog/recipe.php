<?php
require_once "connecting.php";

// Verifica se o ID da receita foi passado pela URL
if (isset($_GET['id'])) {
    $recipe_id = $_GET['id'];

    // Consulta para buscar os detalhes da receita com base no ID
    $sql_query = "SELECT title, content, image_path FROM posts WHERE id = ?";
    $stmt = $conn->prepare($sql_query);
    $stmt->bind_param("i", $recipe_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se a receita foi encontrada
    if ($result->num_rows > 0) {
        $recipe = $result->fetch_assoc();
    } else {
        echo "Receita não encontrada.";
        exit;
    }
} else {
    echo "ID de receita não fornecido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $recipe['title']; ?></title>
    <link rel="stylesheet" href="/blog/styel_homepage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS ONLY-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<!-- JS -->

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 
</head>
<body>
<style>
.img-container {
    display: flex;
    justify-content: center; /* Centraliza a imagem horizontalmente */
    align-items: center; /* Centraliza a imagem verticalmente */
    height: 200px; /* Altura do contêiner; ajuste conforme necessário */
    width: 300px; /* Largura do contêiner; ajuste conforme necessário */
    border: 1px solid #ddd; /* Borda opcional */
    overflow: hidden; /* Esconde qualquer parte da imagem que ultrapasse o contêiner */
}

.img-standard {
    max-width: 100%; /* Garante que a imagem não ultrapasse a largura do contêiner */
    max-height: 100%; /* Garante que a imagem não ultrapasse a altura do contêiner */
    object-fit: cover; /* Ajusta a imagem para cobrir o contêiner sem distorção */
}
    </style>
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
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
            <img src="<?php echo $recipe['image_path']; ?>" class="img-standard" alt="<?php echo $recipe['title']; ?>">
            <div><br></div>
            <h3 class="card-title"><?php echo $recipe['title']; ?></h3>
                    <p class="card-text"><?php echo $recipe['content']; ?></p>
                    <a href="homepage.php" class="btn btn-secondary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Rodapé -->
<footer class="bg-dark text-white text-center py-3 mt-4">
    <p class="mb-0">© 2024 Blog de Receitas. Todos os direitos reservados.</p>
</footer>

</body>
</html>
