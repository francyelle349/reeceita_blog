<?php 
require_once "connecting.php";
if(isset($_POST['submit'])){

   
    $Titulo = $_POST['titulo'];
    $Conteudo = $_POST['conteudo'];
    $Imagem = $_POST['imagem'];

    if($Titulo != "" && $Conteudo != "" && $Imagem != "" ){
        $sql = "INSERT INTO posts (`title`, `content`, `image_path`, `created_at`) VALUES ('$Titulo', '$Conteudo', '$Imagem', CURRENT_DATE)";
        if (mysqli_query($conn, $sql)) {
            header("location: dashboard.php");
        } else {
             echo "Something went wrong. Please try again later.";
        }
    }else{
        echo "Name, Class and Marks cannot be empty!";
    }
}
?> 