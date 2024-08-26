<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>Adicionar Receita</title>
</head>
<body>

<div class="text-center">
        <img src="logo.png" alt="Logo" class="img-fluid " style="max-width: 200px;">
      </div>
      
     <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
      <div class="navbar-nav mx-auto gap-3">
   
        <a class="nav-item nav-link fs-5 fw-bold" href="">Receita Nova</a>
    
      </div>
    </div>
    </nav>

    
</div>
    
<form action="adddata.php" method="post" class="w-50 mx-auto mt-5">


    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" name="titulo" id="titulo" class="form-control">
    </div>

    <div class="mb-3">
        <label for="conteudo" class="form-label">Conteúdo</label>
        <textarea class="form-control" name="conteudo" id="conteudo" rows="10"></textarea>
    </div>

    <div class="mb-3">
        <label for="imagem" class="form-label">Imagem</label>
        <input type="text" name="imagem" id="imagem" class="form-control">
    </div>

    <img src="" alt="" id="imageContainer" class="img-fluid" style="display: none;">

    <button class="btn btn-info btn-lg mt-3" type="submit" name="submit" id="submit">Adicionar Receita</button>
</form>

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
