<?php

use FontLib\EOT\Header;

if(isset($_POST["enviar"])){//Fazer  o envio da mensagem para o e-mail
        //Variáveis
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $mensagem = $_POST['mensagem'];
        $data_envio = date('d/m/Y');
        $hora_envio = date('H:i:s');
    

        //Compo E-mail
        $arquivo = "
        <html>
            <p><b>Nome: </b>$nome</p>
            <p><b>E-mail: </b>$email</p>
            <p><b>Mensagem: </b>$mensagem</p>
            <p>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></p>
        </html>
        ";
        
        //Emails para quem será enviado o formulário
        //$destino = "tortafria10@gmail.com";
        $destino = "contato@itturini.com.br";
        $assunto = "Contato feito pelo Site itturini";
    
        //Este sempre deverá existir para garantir a exibição correta dos caracteres
        $headers  = "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
        $headers .= "From: $nome <$email>";
        
        //Enviar
        if(mail($destino, $assunto, $arquivo, $headers)){
            echo "enviou";

        }else{
            echo "Erro ao enviar";
        }
        
        //header("Location: /home");
}
?>