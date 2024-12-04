<?php
session_start();

include "conexao.php";
    

        $botao = $_POST["Botao"];
        $valor;
        if($botao == "Anel de Rubi")
        {
            $valor = 3;
        }
        if($botao == "Anel de Diamante")
        {
            $valor = 1;
        }
        if($botao == "Anel de Safira")
        {
            $valor = 5  ;
        }
    
        $Comando=$conexao->prepare("SELECT * from produto WHERE id_prod=? ");
            $Comando->bindParam(1,$valor);

            if($Comando->execute())
            {
                if($Comando->rowCount() >0)
                {
                    while($Linha = $Comando->fetch(PDO::FETCH_OBJ))
                    {
                    $id = $Linha->id_prod;
                    $_SESSION['id_prod'] = $id;
    
                    $nome = $Linha->nome_prod;
                    $_SESSION['nome_prod'] = $nome;
    
                    $quilates = $Linha->quilates_prod;
                    $_SESSION['quilates_prod'] = $quilates;
    
                    $dimencoes = $Linha->dimensoes_prod;
                    $_SESSION['dimensoes_prod'] = $dimencoes;

                    $preco = $Linha->preco_prod;
                    $_SESSION['preco_prod'] = $preco;

                    $img = $Linha->img;
                    $_SESSION['img_prod'] = $img;

                    header('location:TelaProduto.php');
                    }
                }
            }
?>