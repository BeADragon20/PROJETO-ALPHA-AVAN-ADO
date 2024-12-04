<?php

session_start();

include "conexao.php";

    
    if($_SESSION['controleCliente'] == "Logado")
    {
        header('location:TelaPagamento.php');
    }
    else
    {
        $_SESSION['controleCliente'] = "novo";
        header('location:TelaLogin.html');
    }
?>