<?php
    session_start(); 
    date_default_timezone_set('america/sao_paulo'); //pega o horário do brasil

    if(isset($_POST['logar']) && !empty($_POST['email']) && !empty($_POST['senha'])){
        include_once('config.php');
        $email = mysqli_real_escape_string($conexao, $_POST['email']);
        $senha = mysqli_real_escape_string($conexao,$_POST['senha']); 

        $sql = "SELECT id,senha, nome, nivel_acesso FROM usuario WHERE email = '$email' LIMIT 1";//verifica se os dados existem no banco
        $result = mysqli_query($conexao, $sql);
        $user = mysqli_fetch_assoc($result); //pega o nome do usuario
        $id = $user['id'];

        $sql_verifica = "SELECT * FROM usuario WHERE id = '$id' and data_cadastro < DATE_SUB(NOW(), INTERVAL 15 day)";
        $verifica = $conexao->query($sql_verifica) or die($conexao->error);
        $num = $verifica->num_rows;
        $hoje = date("Y-m-d H:i:s");
     
        if($num > 0){
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            unset($_SESSION['nome']);
            unset($_SESSION['nivel_acesso']);
           
            header('Location:/login'); //redireciona para a mesma página de login
            $_SESSION['expirou'] = true;
        }else{
            if(password_verify($senha, $user['senha'])){//caso a senha confirme
                 $_SESSION['email'] = $email;
                 $_SESSION['senha'] = $user['senha'];;
                 $_SESSION['nome']  = $user['nome'];
                 $_SESSION['id'] = $user['id'];
                 $_SESSION['nivel_acesso'] = $user['nivel_acesso'];
                 $sql_log = "UPDATE USUARIO SET ultimo_login ='$hoje' WHERE id = '$id' ";
                 $setar = mysqli_query($conexao, $sql_log);
                 header('Location:/admin'); //redireciona para admin   
             }
             else{
                 unset($_SESSION['email']);
                 unset($_SESSION['senha']);
                 unset($_SESSION['nome']);
                 unset($_SESSION['id']);
                 unset($_SESSION['nivel_acesso']);
                 header('Location:/login'); //redireciona para a mesma página de login
                 $_SESSION['usuario_existe'] = true;
             }
        }

    }
    
    $conexao->close();
?>