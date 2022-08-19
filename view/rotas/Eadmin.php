<?php 
    if($_SESSION['nivel_acesso'] != 1){
        header('Location:/admin');
        $_SESSION['naoAdmin'] = true;
        exit();
    }

?>