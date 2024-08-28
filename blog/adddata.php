<?php
require_once "connecting.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];
    $image_path = '';

    // Verifica se uma nova imagem foi enviada pelo usuário
    if (isset($_FILES['nova_imagem']) && $_FILES['nova_imagem']['error'] == 0) {
        $image_name = $_FILES['nova_imagem']['name'];
        $image_tmp_name = $_FILES['nova_imagem']['tmp_name'];
        $image_folder = 'uploads/';

        // Gera um nome único para a imagem
        $unique_image_name = uniqid() . '-' . $image_name;

        // Move a imagem para o diretório de destino
        if (move_uploaded_file($image_tmp_name, $image_folder . $unique_image_name)) {
            // Caminho da imagem para armazenar no banco de dados
            $image_path = $image_folder . $unique_image_name;
        } else {
            echo "Erro ao mover o arquivo de imagem.";
        }
    } elseif (!empty($_POST['imagem'])) {
        // Se nenhuma imagem nova foi enviada, usa a URL fornecida
        $image_path = $_POST['imagem'];
    } else {
        echo "Por favor, forneça uma imagem ou URL válida.";
        exit;
    }

    // Inserir os dados no banco de dados
    $sql = "INSERT INTO posts (title, content, image_path) VALUES ('$titulo', '$conteudo', '$image_path')";

    if (mysqli_query($conn, $sql)) {
        echo "Receita adicionada com sucesso!";
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Erro ao adicionar receita: " . mysqli_error($conn);
    }
}
?>
