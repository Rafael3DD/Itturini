<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    
    include('../../rotas/verificaLogin.php');

    require_once '../../rotas/config.php';

    if(!empty($_POST['codigo'])){      
        $codigo = $_POST['codigo'];
        $avaliacao = $_POST['estrela'];
        header("Location:listarCurriculo");//atualiza e volta a página
        $sql_avalia = "UPDATE curriculo set avaliacao = $avaliacao WHERE codigo = $codigo ";
        echo $sql_avalia;
        $executa = $conexao ->query($sql_avalia) or die ($conexao -> error);
    }else{
        header("Location:listarCurriculo");
    }
    $conexao -> close();
?>