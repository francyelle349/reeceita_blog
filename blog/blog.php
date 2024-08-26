<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- css style -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<link rel="stylesheet" href="style.css">
<!--javascript -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Blog</title>
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
        <a class="nav-item nav-link fs-5" href="#">Receitas</a>
        
        <a class="nav-item nav-link fs-5 " href="#">Sobre</a>
        <a class="nav-item nav-link fs-5" href="#">Contato</a>

      </div>
    
    </div>
    </nav>

    
</div> <!-- end of the navbar-->


<div class="blog-single gray-bg"> <!-- start of the div of the blog-->
    <div class="container">
        <div class="row align-items-start">
            <div class="col-lg-8 m-15px-tb">
                <article class="article">
                    <div class="article-img">
                        <img src="https://mojo.generalmills.com/api/public/content/0MzEn9COZEiFlZxhTlPnkA_webp_base.webp?v=0937a644&t=e724eca7b3c24a8aaa6e089ed9e611fd" alt=""> <!-- link img do artigo, aqui vai ficar de acordo com o id do blog -->
                    </div>
                    <div class="article-title">
                        <h2> titulo do artigo</h2> <!--aqui vai ficar o titulo do blog, de acordo com o id do blog escolhido na seção de homepage-->
                    </div>

                    <div class="article-content">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Porro provident expedita molestias repellat, ad earum pariatur placeat perferendis harum sapiente corrupti voluptas a nulla! Debitis nemo aut ea corporis totam. </p> <!--paragrafo com o artigo, vai ser puxado do banco para cá -->
                    </div>
                </article>
            </div>
        </div>
    </div> <!-- end of the blog -->

</div>
</body>
</html>