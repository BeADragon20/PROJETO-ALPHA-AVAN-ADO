<?php
include "conexao.php";
if ($_SESSION ['controleResp'] == 'localizado' )
{
    echo "Dados do Contato: <br><br>";
    echo "Seu ID: <BR>" . $_SESSION['id_cliente'] . '<br>'.'<br>';
    echo "Nome: <BR>" . $_SESSION['nomeCliente'] . '<br>'.'<br>';
    echo "Endereço: <BR>" . $_SESSION['end_cliente'] . '<br>'.'<br>';
    echo "Email: <BR>" . $_SESSION['emailCliente'] . '<br>'.'<br>';
    echo "Telefone: <BR>" . $_SESSION['foneCliente'] . '<br>'.'<br>';
    echo "Cadastro Localizado com Sucesso: <br><br>";
}
else if ($_SESSION ['controleResp'] == 'respondido')
{
    echo "Resposta gravada com sucesso:<br><br>";
}
else if ($_SESSION ['controleResp'] == 'enviado')
{
    echo "Resposta gravada com sucesso:<br><br>";
}

    // Carrega a tabela
    $Matriz=$conexao->prepare("select * FROM cliente");

    echo "Contatos realizados no site:<BR><BR>";
    $Matriz->execute();

    echo "<table border=1>";
    echo "<tr>";
    echo "<td> Id Contato</td>";
    echo "<td> Nome do Contato </td>";
    echo "<td> Endereço </td>";
    echo "<td> Email do Contato </td>";
    echo "<td> Assunto do contato </td>";
    echo "<td> Menssagem do Contato </td>";
    echo "<td> Resposta do Contato </td>";
    echo "</tr>";

    while ($Linha = $Matriz->fetch(PDO::FETCH_OBJ))
    {
        $idContato = $Linha->ID_CONTATO;
        $nomeContato = $Linha->NOME_CONTATO;
        $foneContato = $Linha->FONE_CONTATO;
        $emailContato = $Linha->EMAIL_CONTATO;
        $assuntoContato = $Linha->ASSUNTO_CONTATO;
        $msgContato = $Linha->MSG_CONTATO;
        $respContato = $Linha->RESP_CONTATO;

        echo "<tr>";
        echo "<td>" .$idContato. "</td>";
        echo "<td>" .$nomeContato. "</td>";
        echo "<td>" .$foneContato. "</td>";
        echo "<td>" .$emailContato. "</td>";
        echo "<td>" .$assuntocontato. "</td>";
        echo "<td>" .$menssagemContato. "</td>";
        echo "<td>" .$respostaContato. "</td>";
        echo "</tr>";
    }

    echo "</table";

if(isset($_REQUEST['valçor']) and ($_REQUEST['valor'] == 'enviado'))
{
    if ($_POST["id_contato"]!= "") $_SESSION['IdContato'] = $_POST["id_contato"];
    if ($_POST["resp_contato"]!= "") $_SESSION['respContato'] = $_POST["resp_contato"];
    $Botao = $_POST ["Botao"];

    if ($Botao == "Alterar")
    {
        include "AlterarContato.php";
    }
    
    if ($Botao == "Enviar")
    {
        include "ResponderContato.php";
    }
    
    if ($Botao == "Alterar")
    {
        include "LocalizarContato.php";
    }
}
else 
{
    ?> 
    <form name="form1" action="FaleConosco.php?valor=enviado" method ="POST">
        Id: <br>  
        <input class="input" type="text" id="Codigo" placeholder="Preencher Id" name="id_contato"><BR><p>
        <input name="Botao" type="submit" value="Localizar"><BR><p>
        Menssagem de Resposta: <BR>
        <textarea name="resp_contato" placeholder="Preencher Resposta" rows="8" cols="40"></textarea><BR><p>

        <input name="Botao" type="submit" value="Alterar">
        <input name="Botao" type="submit" value="Enviar">
    </FORM>
    <?php 
}
?>