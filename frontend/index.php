<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>


<!-- CSS ONLY-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<!-- JS -->

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 

</head>
<body>
    <section style="margin: 50px 0;">
        <h1 style="text-align: center; margin: 50px 0;">Receitas</h1>

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
                    <td><a href="updateData.php?id=<?php echo $Id; ?>" class="btn btn-primary">Edit</a></td>
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
  <button class="btn btn-primary btn-lg" type="submit">Adicione uma Nova Receita</button>
</div>
    </form>
     

    </section>

</body>
</html>