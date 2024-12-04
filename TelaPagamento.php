<?php
  session_start();
      if(isset($_REQUEST['valor'])and ($_REQUEST['valor'] == 'enviado'))
      {
      $pagamento = $_POST["payment"];

      if($pagamento == "Cartao")
      {
        
        $valor = $_POST["preco"];
        $parcela = $_POST["opcao"];
        
        if($parcela == 0)
        {
          echo"Selecione uma condição de pagamento <br>";
          echo "<a href=\"TelaPagamento.php\">VOLTAR</A>";
        }
        else
        {

          $precoParcela = $valor/$parcela;
          $_SESSION['formaPagemento'] = $pagamento;
          $_SESSION['precoPedido'] = $valor;
          $_SESSION['qtdaParcela'] = $parcela;
          $_SESSION['parcela'] = $precoParcela;
          header('location:Pedido.php');
        }
      }
      else
      {
        $valor = $_POST["preco"];
        $parcela = 1;
        $precoParcela = $valor/$parcela;
        $_SESSION['precoPedido'] = $valor;
        $_SESSION['qtdaParcela'] = $parcela;
        $_SESSION['formaPagemento'] = $pagamento;
        $_SESSION['parcela'] = $precoParcela;
        header('location:Pedido.php');
        
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
  <script src="JS/Script.js"></script>
  <title>ATIVIDADE_ALPHA_BÁSICO</title>
</head>

<body>
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

    
  <main>

  <center>
  <div class="container-fluid pt-4">
  <div class="row">
    <div class="col-md border" id="ColunaEsquerda">
    <div class="carded" style="width: 100%">
        <div class="card-body">
          <table>
            <tr>
              <td>
              <?php
                echo'
                <img src="'.$_SESSION['img_prod'].'" alt=""  width="300" height="">'
              ?>
              </td>
              

              <td>
              <?php
                echo' 
                <h2>'.$_SESSION['nome_prod'].'</h2> <br>
                Descrição: '.$_SESSION['quilates_prod']. $_SESSION['dimensoes_prod'].' <br>
                Valor:  '.$_SESSION['preco_prod'].' <br> <br>'
              ?>
              </td> 
            </tr>
          </table>
        </div>
      </div>    
    </div>
    <div class="col-md-4 border-top border" id="ColunaDireita">

    <div class="card border-dark mb-3" style="max-width: 18rem;">
  <div class="card-header">ESCOLHA A FORMA DE PAGAMENTO</div>
  <div class="card-body text-dark">
    <form action="TelaPagamento.php?valor=enviado" method="post">
            <div class="payment-options">
            <label for="boleto">Boleto</label>
              <input type="radio" value="Boleto"  name="payment" id="boleto" onclick="selectPaymentOption('boleto')">
                
              <label for="cartao">Cartão de Crédito</label>
              <input type="radio" value="Cartao" name="payment" id="cartao" onclick="selectPaymentOption('cartao')">

              <div class="installments" id="installments">           
                <label style="width:180px ; " for="Opcao">Escolha uma opção:</label> 
                <br>
                <select id="Opcao" name="opcao" > 
                <br>
                <option name="opcao" value="0">Selecione o parcelamento</option>
                  <option value="1">1x (À vista)</option>
                  <option value="2">2x</option>
                  <option value="3">3x</option>
                  <option value="4">4x</option>
                  <option value="5">5x</option>
                  <option value="6">6x</option>
                  <option value="7">7x</option>
                  <option value="8">8x</option>
                  <option value="9">9x</option>
                  <option value="10">10x</option>
                  <option value="11">11x</option>
                  <option value="12">12x</option>
                </select>
              </div>
            </div>
            <br>

          <center>
            <div  id="tabela" style="display: none;">

            <table >
              <tr>
                <th>Valor da parcela</th>
                <td name="parcela" id="parcela"></td>
        
              </tr>
              <tr>
                <th>Valor total</th>
                <td id="preco"></td>
                <input type="hidden" name="preco" value="<?php echo$_SESSION['preco_prod'];?>">
            </table>
            <br>
            <input id="botaoContinuar" type="submit" value="CONTINUAR" name="Botao" class="btn btn-outline-success">
          </form>   
          </center>
  </div>
</div>
</div>     
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
      


    <script>
          // Captura o elemento select
          var select = document.getElementById("Opcao");
          // Captura o elemento span onde será exibido o valor da parcela
          var installmentValue = document.getElementById("parcela");
          // Captura o elemento span onde será exibido o valor total
          var valorTotal = document.getElementById("preco");           
          // Captura o elemento tabela
          var tabela = document.getElementById("tabela");

            function selectPaymentOption(option) {
            var installments = document.getElementById("installments");
            var installmentSelect = document.getElementById("installments-select");
            
            if (option === "boleto") {
              installments.style.display = "none";
              tabela.style.display ="block";
              var total =<?php echo $_SESSION['preco_prod'] ?>;
              var totalValue = parseFloat(total) // Valor total da compra
              installmentValue.textContent = " R$" + totalValue.toFixed(2);
              valorTotal.textContent= " R$" + totalValue.toFixed(2);

            } else if (option === "cartao") {
              tabela.style.display ="block"
              valorTotal.textContent ="";
              installmentValue.textContent ="";
              installments.style.display = "block";
              calculateInstallmentValue();
            }
          }

          // Função para atualizar o valor da parcela quando o select for alterado
              select.addEventListener("change", 
              function() {
              var optionValue = select.value;
              var installmentAmount = parseInt(optionValue);

              var total =<?php echo $_SESSION['preco_prod'] ?>;
              var totalValue = parseFloat(total) // Valor total da compra


              if (installmentAmount === 1) {
                  installmentValue.textContent = " R$" + totalValue.toFixed(2);
                  valorTotal.textContent =" R$" + totalValue.toFixed(2);
              }
              else if (installmentAmount === 0)
              {
                installmentValue.textContent = " " ;
                  valorTotal.textContent =" ";
              }
              else {
                  var installmentValueText = (totalValue / installmentAmount).toFixed(2); // Calcula o valor da parcela com 2 casas decimais
                  installmentValue.textContent = " R$" + installmentValueText;
                  valorTotal.textContent =" R$" + totalValue.toFixed(2);
              }
            });
      </script>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

<?php
}
?> 