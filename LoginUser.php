<?php
$Botao = $_POST ["Botao"];

if ($Botao == "Logar")
{
        session_start();
        $_SESSION["controleCliente"] = "Logado";
        include "LogadoUser.php";
}
if ($Botao =="Cadastro")
{
    session_start();
    $_SESSION["controleCliente"] = "Novo";
    //será marcado como novo para sabermos que o usuario não tem cadastro
    echo "<a href=\"Cadastrar.php\">Novo</a>";
}

?> 