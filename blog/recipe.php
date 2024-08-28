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
</head>
<body>
    
<div class="text-center mt-3">
    <img src="logo.png" alt="Logo" class="img-fluid" style="max-width: 100px;">
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse justify-content-center">
        <div class="navbar-nav gap-3">
            <a class="nav-item nav-link fs-5 fw-bold" href="#">Receitas</a>
            <a class="nav-item nav-link fs-5 fw-bold" href="#">Sobre</a>
            <a class="nav-item nav-link fs-5 fw-bold" href="#">Contato</a>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <img src="<?php echo $recipe['image_path']; ?>" class="card-img-top" alt="<?php echo $recipe['title']; ?>">
                <div class="card-body">
                    <h3 class="card-title"><?php echo $recipe['title']; ?></h3>
                    <p class="card-text"><?php echo $recipe['content']; ?></p>
                    <a href="homepage.php" class="btn btn-secondary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Rodapé -->
<footer class="bg-light text-center py-3 mt-5">
    <p class="mb-0">© 2024 Blog. Todos os direitos reservados.</p>
</footer>

</body>
</html>
