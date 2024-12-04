<?php
session_start();

include "conexao.php";

$login = $_SESSION['emailCliente'];

$Comando=$conexao->prepare("SELECT * from cliente WHERE email_cliente=?");
    $Comando->bindParam(1,$login);

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


                $nome = $_SESSION['nomeCliente'];
                $email = $_SESSION['emailCliente'];
                $telefone = $_SESSION['foneCliente'];
                $opcoes = "Recuperar senha";
                $mensagem = "Para recuperar sua senha, entre no link: http://localhost/PROJETO_ALPHA_ABAN%c3%87ADO/Esqueceu.php";

                $data_envio = date('d/m/Y');
                $hora_envio = date('H:i:s');

                require_once("phpmailer/class.phpmailer.php");

                include "SenhaEmail.php";
                $para = $email;
                $de = 'easyware.true@outlook.com';
                $de_nome = 'EasyWare';
                $assunto = $opcoes;

                function smtpmailer($para, $de, $de_nome, $assunto, $corpo)
                {
                    global $error;
                    $mail = new PHPMailer();
                    $mail->IsSMTP();
                    $mail->SMTPDebug = 0;
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = 'tls';
                    $mail->Host = 'smtp.office365.com';
                    $mail->Port = 587;
                    $mail->Username = USER;
                    $mail->Password = PWD;
                    $mail->SetFrom($de, $de_nome);
                    $mail->Subject = $assunto;
                    $mail->Body = $corpo;
                    $mail->AddAddress($para);
                    if(!$mail->Send()) {
                        $error = 'Mail error: '.$mail->ErrorInfo;
                        return false;
                    } else {
                        $error = 'Mensagem enviada!';
                        return true;
                    }
                }

                    $Vai = "Nome: $nome\n\nE-mail: $email\n\nTelefone: $telefone\n\nMensagem: $mensagem\n\n $corpo";

                    if (smtpmailer($email, 'easyware.true@outlook.com','EasyWare','Recuperar senha', $Vai)){
                        
                        echo ('Sucesso enviado,');
                        $_SESSION['controlResp'] = "enviado";
                        header('location:TelaLogin.html');

                    }
                    if (!empty($error)) echo $error;

                            
                            }
                        }
                    
                    }
                    else
                    {
                        echo "<script> alert ('Usuário e/ou senha não confere!')</script>";
                        echo "<a href=\"FaleConoscoCliente.php\">Retornar</a>";
                    }



    ?>