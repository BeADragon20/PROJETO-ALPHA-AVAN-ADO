
    <?php 
    session_start();
    include "conexao.php";

    if(isset($_REQUEST['valor']) and ($_REQUEST['valor'] == 'enviado'))
    {
        if ($_POST['email_cliente']!= "") $_SESSION['email_cliente'] = $_POST['email_cliente'];
        if ($_POST['senha_cliente']!= "") $_SESSION['senhaCliente'] = $_POST['senha_cliente'];

        $Botao = $_POST["Botao"];

        if ($Botao == "Alterar")
        {
            header('location:AlterarSenha.php');
        }
        
    }
    else
    {
      ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/Estilo1.CSS">
    <title>ATIVIDADE_ALPHA_BÁSICO</title>
</head>

<body>
<nav>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
      <img src="https://cdn-icons-png.flaticon.com/512/3043/3043797.png" width="30" height="30" class="d-inline-block align-top" alt="">
      NÃO É UM GOLPE! 
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="Index.html">INICIO <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            USUÁRIO
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="TelaLogin.html">LOGIN</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="TelaCadastro.html">CADASTRO</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</nav>


    
<main> 
<br>
<center>
<div class="col-lg" id="ColunaCentro">
          <br>
          <br>
          <div class="card" style="width: 45%">
            <div class="card-body">
          
          <h2 style="font-family: Arial, Helvetica, sans-serif; font-weight: bolder;">RECUPERAR SENHA</h2><br>

            <form action="Esqueceu.php?valor=enviado" method="POST">
        
            <label for="e-MAIL">E-mail:</label>
            <input type="email" id="email" name="email_cliente" required><br><br>
        
            <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha_cliente" required><br><br>
                <input name="Botao" type="submit" class="btn btn-outline-dark" value="Alterar"> <br><p>
            </form><br>

          </div>
          </div>
        </div>
        </center>
</main>


        
    </p>
      <footer class="bg-dark text-center text-white " id="rodape">
      <!-- Grid container -->
      <div class="container p-4 pb-0">
        <!-- Section: Social media -->
        <section class="mb-4">
          <!-- Facebook -->
          <a class="btn btn-floating m-1" href="#!" role="button">
            <img src="https://assets.stickpng.com/images/60fea6773d624000048712b5.png" alt="" width="35px">
            <i class="fab fa-facebook-f"></i
          ></a>
    
          <!-- Twitter -->
          <a class="btn btn-floating m-1" href="#!" role="button">
            <img src="https://iconsplace.com/wp-content/uploads/_icons/ffffff/256/png/twitter-icon-18-256.png" alt="" width="35px">
            <i class="fab fa-twitter"></i
          ></a>
    
          <!-- Google -->
          <a class="btn btn-floating m-1" href="#!" role="button">
            <img src="https://www.pngkit.com/png/full/457-4579990_gmail-white-icon-png.png" alt="" width="35px">
            <i class="fab fa-google"></i>
          </a>
    
          <!-- Instagram -->
          <a class="btn btn-floating m-1" href="#!" role="button">
            <img src="https://www.edigitalagency.com.au/wp-content/uploads/new-Instagram-logo-white-glyph.png" alt="" width="35px">
            <i class="fab fa-instagram"></i>
          </a>
    
          <!-- Github -->
          <a class="btn btn-floating m-1" href="#!" role="button">
            <img src="https://icon-library.com/images/github-icon-white/github-icon-white-6.jpg" alt="" width="35px">
            <i class="fab fa-github"></i
          ></a>
        </section>
        <!-- Section: Social media -->
      </div>
      <!-- Grid container -->
      
      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 Copyright:
        <a class="text-white" href="Index.html">BANGU II</a>
      </div>
      <!-- Copyright -->
    </footer>
  
      <script src="JS/Script.js"></script>
      
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
  </html>
        <?php
    }
    ?>
    