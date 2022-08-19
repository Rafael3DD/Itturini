<?php
if (!isset($_SESSION)) {
    session_start();
}

// se não existir a sessão retorna para a página de login
include('../../rotas/verificaLogin.php');

require __DIR__ . '/../../layouts/Header.php';
require_once '../../rotas/config.php';

//Campo pesquisa
if(isset($_POST['botaoPesquisar'])){
    $txtPesquisa = trim((isset($_POST['campoPesquisar'])) ? $_POST['campoPesquisar']: "");
   
}else{
    $txtPesquisa = trim((isset($_GET['palavra']))? $_GET['palavra']: "");
}

$itens_por_pagina = 9;

$pagina = 0;
if(isset($_GET['pagina'])){
    $pagina = intval($_GET['pagina']);
}

$inicio=$pagina*$itens_por_pagina;
$sql = "SELECT *FROM usuario WHERE nome like '%{$txtPesquisa}%' or email like '%{$txtPesquisa}%'  ORDER BY nome LIMIT $inicio, $itens_por_pagina";
$execute = $conexao->query($sql) or die($conexao->error);
$usuario = $execute->fetch_assoc();
$num = $execute->num_rows;

//quantidade total de objetos
$num_total = $conexao->query("SELECT *FROM usuario WHERE nome like '%{$txtPesquisa}%' or email like '%{$txtPesquisa}%'")->num_rows;
$num_paginas = ceil($num_total / $itens_por_pagina);
$conexao->close();
?>
<!DOCTYPE html>

<head>

    <script src="/public/js/modalExclusao.js"></script>

    <div class="container-fluid">
        <div class="row">
            
            <!--Painel Horizontal-->
            <?php require __DIR__ .'/../../layouts/headerPainel.php';?>
            
            <div class="col-md-10 mt-4 mb-4 mx-auto">
                <a href="/painelUsuarios"><button class="btn" id="button-voltar"><i class="fa-solid fa-arrow-left"></i> voltar</button></a>


            <!--Mensagem de email existente-->       
            <?php
               if(isset($_SESSION['email_existe'])):
            ?>
               <div class="alert alert-danger  w-50 mx-auto text-center" role="alert">
                   <p>Erro! Email já existe</p>
               </div> 
            <?php
               endif;
               unset($_SESSION['email_existe']);
            ?>

            <!--Mensagem sucesso deleção-->
            <?php
                    if(isset($_SESSION['usuario_deleta'])):
                ?>
                    <div class="alert alert-success w-50 mx-auto text-center" role="alert">
                        <p>Usuario <strong><?php echo $_SESSION['nome_user_deletado'];?></strong> deletado com sucesso!</p>
                    </div> 
                <?php
                    endif;
                    unset($_SESSION['usuario_deleta']);
                    unset($_SESSION['nome_user_deletado']);
            ?>


            <!--Mensagem de sucesso do cadastro -->
            <?php 
                if(isset($_SESSION['status_cadastro'])):
            ?>
                <div class="alert alert-success w-50 mx-auto text-center" role="alert">
                    <p>Usuario <strong><?php echo $_SESSION['nome_user'];?></strong> Cadastrado com sucesso!</p>
                </div>
            <?php
                endif;
                unset($_SESSION['status_cadastro']);
                unset($_SESSION['nome_user']);
            ?>


            <!--Mensagem sucesso Edição-->
            <?php
                    if(isset($_SESSION['vaga_editada'])):
                ?>
                    <div class="alert alert-success w-50 mx-auto text-center" role="alert">
                        <p>Usuario <strong><?php echo $_SESSION['nome_edit'];?></strong> editado com sucesso!</p>
                    </div> 
                <?php
                    endif;
                    unset($_SESSION['vaga_editada']);
                    unset($_SESSION['nome_edit']);
            ?>
            
            <h3 class="text-center mb-3" style="color:#217c81;">Usuários Cadastrados</h3>
                <div class="container">
                    <form action="listarUsuarios?pagina=0" method="POST">  
                    <div class="row mx-auto text-center w-100 justify-content-center">    
                            <div style="width:75%; margin:0; text-align:center;">
                                <input type="text" value="<?=$txtPesquisa?>" class="form-control shadow-none" name="campoPesquisar" id="campoPesquisar" placeholder="Nome ou o E-mail do usuário">
                            </div>
                            <div  style="width:5%; margin:0;">
                                <button name="botaoPesquisar" id="botaoPesquisar"><i class="fa-solid fa-magnifying-glass"></i><p>Pesquisar</p></button>
                            </div>  
                        </div>
                    
                    </form>
                </div>        

            <?php if ($num > 0) { ?>
                <div class="table-responsive w-100">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Nome</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Admin</th>   
                                <th scope="col">Editar</th>
                                <th scope="col">Deletar</th>                             
                            </tr>
                        </thead>
                        <tbody>
                            <?php do { ?>
                                <tr>
                                    <td> <?php echo $usuario['id']; ?></td>
                                    <td> <?php echo $usuario['nome']; ?></td>
                                    <td> <?php echo $usuario['email'] ?></td>
                                    <td> <?= ($usuario['eAdmin'] == 0)? "Não" :'sim'?> </td>
                                  

                                    <td>
                                        <a href="/editarUsuario?codigo=<?php echo $usuario['id']?>&&email=<?php echo $usuario['email']?>">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </td>

                                        <!--Deletar-->
                                        <td>
                                            <a name="deletar" onclick="idUser(<?php echo $usuario['id']; ?>, '<?php echo $usuario['nome'];?>')" id="apagar" href="#"> 
                                                <i class="fa-solid fa-trash-can" data-bs-toggle="modal" data-bs-target="#deleteModal"></i>
                                            </a>
                                        </td>                             
                                </tr>
                                
                            <?php } while ($usuario = $execute->fetch_assoc()); ?>
                        </tbody>
                    </table>
                </div>
                <?php }else { ?>
                    <h1>Nenhuma Usuario cadastrado!</h1>
                <?php }?>
            
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item"><a class="page-link" href="listarUsuarios?pagina=0">Início</a></li>
                            <?php for($i=0; $i<$num_paginas; $i++){
                            $estilo = "";
                            if($pagina == $i)
                                $estilo = "class=\"active\""
                            ?>
                                <li <?php echo $estilo; ?> class="page-item"><a class="page-link" href="listarUsuarios?pagina=<?php echo $i; ?>"><?php echo $i+1;?></a></li>
                            <?php }?>  
                        <li class="page-item"><a class="page-link" href="listarUsuarios?pagina=<?php echo $num_paginas-1;?>">Final</a></li>
                    </ul>
                </nav>    
            </div>
        </div>
    </div>
<!--Modal exclusão de curriculo-->
<form id="deleteform" method='post' enctype='multipart/form-data'>
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title text-white" id="exampleModalLabel">APAGAR USUARIO</h5>
                        <button type="button" class="btn-close  
                                shadow-none" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4 id="mensagem"></h4>
                    </div>
                        
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Apagar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>  
                    </div>
                </div>
            </div>
        </div>

    </form>
    
 
<?php
    require __DIR__ . '/../../layouts/Footer.php';
?>

<script>
    $().ready(function() {
	setTimeout(function () {
		$('.alert').hide(); // "foo" é o id do elemento que seja manipular.
	}, 3000); // O valor é representado em milisegundos.
    });
    
</script>