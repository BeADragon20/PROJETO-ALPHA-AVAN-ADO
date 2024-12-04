
<?php
    session_start();
    $_SESSION["controleCliente"] = "Novo";


    $Botao = $_POST["Botao"];
    $Nome = $_POST["nome_cliente"];
    $End = $_POST["endereco"];
    $Fone = $_POST["telefone"];
    $Email = $_POST["email"];
    $Senha_Cliente = $_POST["senha_cliente"];
    $Confirmar = $_POST["confirmar_senha"];

    include "conexao.php";

    if ($Botao == "CADASTRAR")
    {
        try
        {
            if ($Senha_Cliente == $Confirmar)
            {
                $Comando=$conexao->prepare("INSERT INTO cliente (nome_cliente , end_cliente, email_cliente , senha_cliente , fone_cliente) VALUES ( ?, ?, ?, ?, ?)");
                
                    $Comando->bindParam(1, $Nome);
                    $Comando->bindParam(2, $End);
                    $Comando->bindParam(3, $Email);
                    $Comando->bindParam(4, $Senha_Cliente);
                    $Comando->bindParam(5, $Fone);

                
                if ($Comando->execute())
                {
                    if ($Comando->rowCount () >0)
                    {
                        echo "<script> alert('Cadastro Realizado com Sucesso!')</script>";

                        $Nome = null;
                        $Email = null;
                        $Senha = null;
                        $End = null;
                        $Fone = null;

                        echo "<a href=\"TelaLogin.html\">LOGAR</A>";
                    }
                    else
                    {
                        echo "Erro ao tentar efetivar o contato. ";
                    }
                }
                else
                {
                    throw new PDOException("Erro: Não foi possivel executar a declaração sql.");
                }
            }
            else
            {
                echo ('Senha não conferem').'<BR>';
                echo "<a href=\"TelaCadastro.html\">Erro ao se cadastrar, tente novamente</a>";
            
            }
        }
        catch(PDOException $e) {
            echo "Erro" . $e->getMessage();
        }
        
    }
?>