<?php
session_start();

include "conexao.php";

  $Comando=$conexao->prepare("SELECT * from pedidomb");

  if($Comando->execute())
  {
      if($Comando->rowCount() >0)
      {
          while($Linha = $Comando->fetch(PDO::FETCH_OBJ))
          {
              $id_pedido = $Linha->id_pedido;
              $_SESSION['id_pedidoMB'] = $id_pedido;

              $data = $Linha->dta_pedido;
              $_SESSION['dta_pedido'] = $data;

              $valorPedido = $Linha->valor_pedido;
              $_SESSION['valorPedido']= $valorPedido;

              $id_cliente = $Linha->id_cliente;
              $_SESSION['idCliente'] = $id_cliente;

              $id_prod = $Linha->id_prod;
              $_SESSION['id_prod'] = $id_prod;

          }
      }
                
    }
    if(isset($_REQUEST['valor'])and ($_REQUEST['valor'] == 'alterar'))
    {
  
      include "conexao.php";
      try{

      $Nome_Cliente = $_POST['Nome'];
      $End_Cliente = $_POST['endereco'];
      $Id_Cliente = $_SESSION['id_cliente'];
  
      $Comando=$conexao->prepare("UPDATE cliente SET nome_cliente=?, end_cliente=? WHERE id_cliente=?");
      $Comando->bindParam(1, $Nome_Cliente);
      $Comando->bindParam(2, $End_Cliente);
      $Comando->bindParam(3, $Id_Cliente);

 
      if ($Comando->execute())
      {
        if ($Comando->rowCount() >0)
        {
         
        header('location:GerPedido.php'); 
                              
        }
      }
        else
        {
            echo 'erro';
        }
      }
      catch (PDOException $erro)
      {
        echo"Erro" . $erro->getMessage();

      }
  }

else{
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


    <div class="collapse navbar-collapse"  id="navbarSupportedContent">
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
<center>
  <h4>Alterar Cadastro</h4>
<form action="GerPedido.php?valor=alterar" method="post">
<input type="text" name="Nome" placeholder="Nome">
<input type="text" name="endereco" placeholder="endereço">
<br><br>
<input type="submit" name="Botao" value="alterar">
</form>
<br><br>


  <?php    
    echo "<h4>Dados do Contato: </h4>";
    echo '
  <table border="1">
    <tr>
      <th>Id do pedido</th>
      <th>Id do Produto</th>
      <th>Id do Cliente</th>
      <th>Nome do Cliente</th>
      <th>Endereço de entrega</th>
      <th>Forma de pagamento</th>
      <th>Condição de parcela</th>
      <th>Valor da parcela</th>
      <th>Valor do pedido</th>
      <th>Data do pedido</th>
    </tr>
    <tr>
      <td> '.$_SESSION["id_pedidoMB"] .'</td>
      <td>'.$_SESSION["id_prod"] .'</td>
      <td>'.$_SESSION["id_cliente"] .'</td>
      <td>'.$_SESSION["nomeCliente"] .'</td>
      <td>'.$_SESSION["end_cliente"] .'</td>
      <td>'.$_SESSION["formaPagemento"] .'</td>
      <td>'.$_SESSION["qtdaParcela"] .'</td>
      <td>'.number_format($_SESSION['parcela'], 2, ',', '.').'</td>
      <td>'.number_format ($_SESSION['valorPedido'], 2, ',', '.').'</td>
      <td>'.$_SESSION["dta_pedido"] .'</td>
    </tr>
  </table>
  ';
    ?>
    </center>
</main>




<footer class="bg-dark text-center text-white" id="rodape">
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