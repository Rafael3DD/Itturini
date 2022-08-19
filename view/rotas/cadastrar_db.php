<?php
session_start();
include_once('config.php');
        $nome   =  ucwords( mysqli_real_escape_string($conexao, trim($_POST['nome'])) ) ;
        $sobrenome = ucwords( mysqli_real_escape_string($conexao, trim($_POST['sobrenome'])) );
        $email  = mysqli_real_escape_string($conexao, trim($_POST['email']));
        $senha  = mysqli_real_escape_string($conexao, trim($_POST['senha']));
        $senha2 = mysqli_real_escape_string($conexao, trim(($_POST['senha2'])));
        if($senha === $senha2){
            $nome = $nome." ".$sobrenome;
            //criptografar senhas
            $criptSenha = password_hash($senha, PASSWORD_DEFAULT);
    
            //passa a senha criptografada
            $senha = $criptSenha;
            
            $sql = "select count(*) as total from usuario where email = '$email'";
            $result = mysqli_query($conexao,$sql);
            $row = mysqli_fetch_assoc($result);
    
            if($row['total'] == 1){ //Verifica se o usuario existe
                $_SESSION['email_existe'] = true; 
                header('Location: /cadastrar');
                exit;
            }
            $sql = "INSERT INTO usuario(nome, email, senha, data_cadastro) 
            VALUES('$nome','$email','$senha', NOW())";
            if($conexao -> query($sql)===true){
                $_SESSION['status_cadastro'] = true; //quando confirmar que o usuario foi cadastrado
            }
        }else{
            $_SESSION['senha_diferente'] = true;
        }


    $conexao->close();
    header('Location: /login');
    exit;
?>