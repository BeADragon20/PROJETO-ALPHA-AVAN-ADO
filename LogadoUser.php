<?php
//session_start inicia a sessão 
session_start();
//as variáveis login a senha recebem os dados digitados na página anterios
$login = $_POST['usuario_login'];
$senha = $_POST['senha_login'];
// as próximas 3 linhas são responsáveis em se conectar com o banco de dados.

include "conexao.php";
// a variavel  $ result pega as varias $login e $ senha faz uma pesquisa na tabala de usuarios


if ($login == '' || $senha == '') 
{
    
    unset ($_SESSION['controleCliente']);

    echo "<script> alert ('Usuário e/ou senha invalidos!')</script>";

    echo "<a href=\"TelaLogin.html\">Retornar</a>";
}
else{

$Comando=$conexao->prepare("SELECT * from cliente
                            WHERE email_cliente=? AND senha_cliente=?");
    $Comando->bindParam(1,$login);
    $Comando->bindParam(2,$senha);



    if($Comando->execute())
    {
    if($Comando->rowCount() >0)
    {
        while($Linha = $Comando->fetch(PDO::FETCH_OBJ))
        {
                $id = $Linha->id_cliente;
                $_SESSION['id_cliente'] = $id;

                $nome = $Linha->nome_cliente;
                $_SESSION['nomeCliente'] = $nome;

                $end = $Linha->end_cliente;
                $_SESSION['end_cliente']= $end;
            
                $email = $Linha->email_cliente;
                $_SESSION['emailCliente'] = $email;

                $senha = $Linha->senha_cliente;
                $_SESSION['senhaCliente'] = $senha;

                $fone = $Linha->fone_cliente;
                $_SESSION['foneCliente'] = $fone; 
            
                $_SESSION['controleCliente'] = "Logado";
             
                if($_SESSION['id_prod'] != '')
                {
                    header('location:TelaProduto.php');
                }
                else{
                    header('location:Index.html');
                }
                /*$valor2 = isset($_SESSION['controleCliente']) ? 'S' : 'N';
                echo "$valor2";*/
            }
        }
       

        else
        {
            
            $_SESSION['controleCliente'] = "novo";

            echo "<script> alert ('Usuário e/ou senha não confere!')</script>";

            echo "<a href=\"TelaLogin.html\">Retornar</a>";
        }
    }
}
?>