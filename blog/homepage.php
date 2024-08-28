<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="/blog/styel_homepage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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

<!-- Carousel de Receitas -->
<div id="recipeCarousel" class="carousel slide mt-5" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php
        require_once "connecting.php";

        $sql_query = "SELECT id, title, image_path FROM posts LIMIT 6;";
        $result = $conn->query($sql_query);
        $active_class = 'active';
        $items_per_slide = 2;
        $items = [];
        
        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }
        
        for ($i = 0; $i < count($items); $i += $items_per_slide) {
            $slide_items = array_slice($items, $i, $items_per_slide);
            echo '<div class="carousel-item ' . $active_class . '">
                    <div class="d-flex justify-content-center">';
            foreach ($slide_items as $item) {
                echo '<div class="card mx-2" style="width: 45%;">
                        <img src="' . $item['image_path'] . '" class="d-block w-100" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title">' . $item['title'] . '</h5>
                            <a href="recipe.php?id=' . $item['id'] . '" class="btn btn-primary">Leia mais >></a>
                        </div>
                      </div>';
            }
            echo '  </div>
                  </div>';
            $active_class = '';
        }
        ?>
    </div>

    <!-- Botões de navegação do carrossel -->
    <button class="carousel-control-prev" type="button" data-bs-target="#recipeCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#recipeCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- Rodapé -->
<footer class="bg-light text-center py-3">
    <p class="mb-0">© 2024 Blog. Todos os direitos reservados.</p>
</footer>

</body>
</html>
