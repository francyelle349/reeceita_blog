<!DOCTYPE html>
<html lang="en">

<?php
require_once "connecting.php";

if(isset($_POST["titulo"]) && isset($_POST["conteudo"]) && isset($_POST["imagem"])){
    $Titulo = mysqli_real_escape_string($conn, $_POST['titulo']);
    $Conteudo = mysqli_real_escape_string($conn, $_POST['conteudo']);
    $Imagem = mysqli_real_escape_string($conn, $_POST['imagem']);

    $sql = "UPDATE posts SET `title`= '$Titulo', `content`= '$Conteudo', `image_path`= '$Imagem' WHERE id= ".$_GET["id"];
    if (mysqli_query($conn, $sql)) {
        header("location: index.php");
        exit();
    } else {
        echo "Something went wrong. Please try again later: " . mysqli_error($conn);
    }
}                  
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>Editar Receita</title>
</head>
<body>

<?php 
require_once "connecting.php";
$sql_query = "SELECT * FROM posts WHERE id = ".$_GET["id"];
if ($result = $conn->query($sql_query)) {
    while ($row = $result->fetch_assoc()) { 
        $Id = $row['id'];
        $Titulo = $row['title'];
        $Conteudo = $row['content'];
        $Imagem = $row['image_path'];
?>

<form action="updateData.php?id=<?php echo $Id; ?>" method="post" class="w-50 mx-auto mt-5">
    <h1>Editar Receita</h1>

    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo htmlspecialchars($Titulo); ?>">
    </div>

    <div class="mb-3">
        <label for="conteudo" class="form-label">Conteúdo</label>
        <textarea class="form-control" name="conteudo" id="conteudo" rows="10"><?php echo htmlspecialchars($Conteudo); ?></textarea>
    </div>

    <div class="mb-3">
        <label for="imagem" class="form-label">Imagem</label>
        <input type="text" name="imagem" id="imagem" class="form-control" value="<?php echo htmlspecialchars($Imagem); ?>">
    </div>

    <img src="<?php echo htmlspecialchars($Imagem); ?>" alt="Image preview" id="imageContainer" class="img-fluid" style="display: <?php echo $Imagem ? 'block' : 'none'; ?>;">

    <button class="btn btn-primary btn-lg mt-3" type="submit" name="submit" id="submit">Atualizar Receita</button>
</form>

<?php 
    }
}
?>

<script>
    const imageInput = document.getElementById('imagem');
    const imageContainer = document.getElementById('imageContainer');

    function updateImage() {
        const imageUrl = imageInput.value;
        imageContainer.src = imageUrl;
        imageContainer.style.display = imageUrl ? 'block' : 'none';
    }

    imageInput.addEventListener('input', updateImage);
</script>

</body>
</html>
