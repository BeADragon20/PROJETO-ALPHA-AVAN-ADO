<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php 
    session_start();
    include "conexao.php";

    if(isset($_REQUEST['valor']) and ($_REQUEST['valor'] == 'enviado'))
    {
        if ($_POST['emailCliente']!= "") $_SESSION['emailCliente'] = $_POST['emailCliente'];

        $Botao = $_POST["Botao"];
        $_SESSION['emailCliente'] = $_POST["emailCliente"];

        if ($Botao == "Alterar")
        {
            header('location:Email.php');
        }
        
    }
    else
    {
        ?>
        <form action="FaleConoscoCliente.php?valor=enviado" method="POST">
        <Input class="input" type="text" id ="Email" placeholder="Preencher Email" name="emailCliente">
        <br>           
        <input name="Botao" type="submit" value="Alterar"> <br><p>
        
    </p>
        </form>
        </body>
        <?php
    }
    ?>