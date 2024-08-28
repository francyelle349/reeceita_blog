<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/blog/styel_homepage.css">


<!-- CSS ONLY-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<!-- JS -->

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 

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
        <a class="nav-item nav-link fs-5 fw-bold" href="">Todas Minhas Receitas</a>
        
        <a class="nav-item nav-link fs-5 " href="/blog/homepage.php">Homepage</a>
    
      </div>
    </div>
    </nav>

    
</div> <
    <section style="margin: 50px 0;">
     

        <div class="container">

         <table class="table table-light table-bordered" >
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Titulo</th>
                <th scope="col">Conteudo</th>
                <th scope="col">Imagem</th>
                <th scope="col">Data</th>
                <th scope="col">Editar</th>
                <th scope="col">Deletar</th>
              </tr>
            </thead>

            <tbody>
                <?php
                require_once "connecting.php";

                $sql_query = " SELECT id,content, title,  image_path, created_at FROM posts;";

                if($result = $conn -> query($sql_query)){
                    while($row = $result -> fetch_assoc())
                    {
                        $Id = $row['id'];
                        $Titulo = $row['title'];
                        $Conteudo = substr($row['content'],0, 100) . '...';
                        $Imagem = $row["image_path"];
                        $Data = $row["created_at"];

                        
                ?>

                <tr>
                    <td><?php echo $Id; ?></td>
                    <td><?php echo $Titulo; ?></td>
                    <td><?php echo $Conteudo ?></td>
                    <td><img src="<?php echo $Imagem; ?>" style="max-width: 100px; height: auto;" alt="Imagem da receita"></td>

                    <td><?php echo $Data?></td>
                    <td><a href="updateData.php?id=<?php echo $Id; ?>" class="btn btn-info">Edit</a></td>
                    <td><a href="deletedata.php?id=<?php echo $Id; ?>" class="btn btn-danger">Delete</a></td>
                    
                </tr>

                <?php
                        }

                    }
                ?>


            </tbody>


        
         </table>
     
    <form action="formulario.php">
    <div class="d-flex justify-content-end">
  <!-- other content -->
  <button class="btn btn-info btn-lg" type="submit">Adicione uma Nova Receita</button>
</div>
    </form>
     

    </section>

<footer class="bg-light text-center py-3">
    <p class="mb-0">© 2024 Blog. Todos os direitos reservados.</p>
</footer>
</body>
</html>