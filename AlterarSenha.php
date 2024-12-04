<?php
session_start();
$senhaCliente = $_SESSION['senhaCliente'];
$Email = $_SESSION['email_cliente'];
include "conexao.php";
try{
    
    $AtualizarContato=$conexao->prepare("UPDATE cliente SET senha_cliente=? WHERE email_cliente=?");
    $AtualizarContato->bindParam(1, $senhaCliente);
    $AtualizarContato->bindParam(2, $Email);


    if ($AtualizarContato->execute())
    {
        if ($AtualizarContato->rowCount() >0)
        {
            echo "<script> alert('Senha Alterada com Sucesso!')</script>";
            echo "<a href=\"TelaLogin.html\">LOGAR</A>";
        }

    }
}
catch (PDOException $erro)
{
    echo"Erro" . $erro->getMessage();

}
?>