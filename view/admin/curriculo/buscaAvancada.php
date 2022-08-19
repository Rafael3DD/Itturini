<?php
if (!isset($_SESSION)) {
    session_start();
}
// se não existir a sessão retorna para a página de login
include('../../rotas/verificaLogin.php');


require __DIR__ . '/../../layouts/Header.php';
require_once '../../rotas/config.php';


$sexo           =   trim((isset($_POST['sexo']))? $_POST['sexo']: "");
$idade          =   trim((isset($_POST['idade']))? $_POST['idade']: "");
$filhos         =   trim((isset($_POST['filhos']))? $_POST['filhos']: "");
$filhos = str_replace('-', ' AND ', $filhos);
$estadoCivil    =   trim((isset($_POST['civil']))? $_POST['civil']: "");
$cidade         =   trim((isset($_POST['cidade']))? $_POST['cidade']: "");
$estado         =   trim((isset($_POST['estado']))? $_POST['estado']: "");
$profissao      =   trim((isset($_POST['profissao']))? $_POST['profissao']: "");

//Campo pesquisa
if(isset($_POST['botaoPesquisar'])){
    $txtPesquisa = trim((isset($_POST['campoPesquisar'])) ? $_POST['campoPesquisar']: "");//se tiver algo digitado no campo de pesquisa
   
}else{
    $txtPesquisa = trim((isset($_GET['palavra']))? $_GET['palavra']: ""); //não tiver nada digitado no campo de pesquisa
}

//Paginação
$itens_por_pagina = 9;
$pagina = 0; //página inicial
if(isset($_GET['pagina'])){
    $pagina = intval($_GET['pagina']);
}
$inicio=$pagina*$itens_por_pagina;

    $sql = "SELECT *FROM curriculo WHERE nome like '%{$txtPesquisa}%' ";
    

if(!empty($sexo)){
    $sql .="AND sexo  = '$sexo' ";
}

//calcular idade pelo ano 
if(!empty($idade)){
    $sql .="AND dt_nascimento  = '$idade' ";
}

if(!empty($filhos)){
    $sql .="AND filhos BETWEEN $filhos";
}

if(!empty($estadoCivil)){
    $sql .="AND estadocivil = '$estadoCivil' ";
}

if(!empty($cidade)){
    $sql .="AND cidade = '$cidade' ";

}

if(!empty($estado)){
    $sql .="AND UF_estado = '$estado' ";
}

if(!empty($profissao)){
    $sql .="AND profissao = '$profissao' ";
}

$sql .= ' ORDER BY nome LIMIT '. $inicio.",".$itens_por_pagina;


//Busca
$execute = $conexao->query($sql) or die($conexao->error);
$curriculo = $execute->fetch_assoc();


$num = $execute->num_rows;

//quantidade total de objetos
$num_total = $conexao->query("SELECT *FROM curriculo WHERE nome like '%{$txtPesquisa}%'")->num_rows;
$num_paginas = ceil($num_total / $itens_por_pagina);

function formataData($data){
    $data = str_replace("-", "/", $data);
    print_r(date('d/m/Y', strtotime($data)));
}

//cidades 
$sql_estado = "SELECT DISTINCT UF_estado from curriculo";
$execute_estado = $conexao ->query($sql_estado) or die($conexao ->error);
$NomEstado = $execute_estado->fetch_assoc();


//Estados
$sql_cidade = "SELECT DISTINCT cidade from curriculo";
$execute_cidade = $conexao ->query($sql_cidade) or die($conexao ->error);
$NomCidade = $execute_cidade->fetch_assoc();


//profissão
$sql_profissao = "SELECT DISTINCT profissao FROM curriculo where profissao <> '' ";
$execute_profissao = $conexao -> query($sql_profissao) or die ($conexao -> error);
$NomProfissao = $execute_profissao -> fetch_assoc();




$conexao->close();
?>
<!DOCTYPE html>

<head>


    <script src="/assets/js/modalExclusao.js"></script>
    <script src="https://kit.fontawesome.com/f1adbfc707.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700|Spartan:300,400,700|Ubuntu:300,400&display=swap" rel="stylesheet">


    <div class="container-fluid">
        <div class="row">
            <!--Painel Horizontal-->
            <?php require __DIR__ .'/../../layouts/headerPainel.php';?>

            <div class="col-md-10 mt-2 mx-auto"> 

                <a href="/painelCurriculo"><button class="btn" id="button-voltar"><i class="fa-solid fa-arrow-left"></i> voltar</button></a>

                <h3 class="text-center mb-3" style="color:#217c81;">Busca Com Filtro</h3>
                <div class="container">
                    <form action="buscaAvancada?pagina=0" method="POST">
                    <div class="row justify-content-center" id="filtro">
                        <!--Busca-->
                        
                        <div id="inputPesquisa">
                            <input type="text" value="<?=$txtPesquisa?>" class="form-control shadow-none" name="campoPesquisar" id="campoPesquisar" placeholder="Digite o nome">
                        </div>
                        

                         <!--Sexo-->
                        <select name="sexo" id="sexo" >
                            <option selected value="">Sexo</option> 
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                        </select>

                        <!--Idade-->
                        <input type="date" value="" class="form-control" name="idade" id="idade" placeholder="Idade">
                        
                        <!--Filhos-->
                        <select name="filhos" id="filhos">
                            <option selected value="">Filhos</option> 
                            <option value="1-5">1-5</option>
                            <option value="5-10">5-10</option>
                            <option value="10-100">10-100</option>
                        </select>
                        
                        <!--estado civil-->
                        <select name="civil" id="civil">
                            <option selected value="">Estado Civil</option>
                            <option value="Solteiro(a)">Solteiro(a)</option>
                            <option value="Casado(a)">Casado(a)</option>
                            <option value="Divorciado(a)">Divorciado(a)</option>
                            <option value="Viúvo(a)">Viúvo(a)</option>
                            <option value="Separado(a)">Separado(a)</option>
                            <option value="União estável">União estável</option>
                            <option value="Indiferente">Indiferente</option>
                        </select>
                        
                        <!--Cidade-->
                        <select name="cidade" id="cidade">
                            <option selected value="">Cidade</option> 
                            <?php do { ?>
                                <option value="<?= $NomCidade['cidade']?>"><?= $NomCidade['cidade']?></option>
                            <?php } while($NomCidade = $execute_cidade->fetch_assoc())?>
                        </select>

                        <!--Estado-->   

                        <select name="estado" id="estado">
                            <option selected value="">Estado</option> 
                            <?php do { ?>
                                <option value="<?= $NomEstado['UF_estado']?>"><?= $NomEstado['UF_estado']?></option>
                            <?php } while($NomEstado = $execute_estado->fetch_assoc())?>
                        </select>

                           <select name="profissao" id="profissao">
                                <option selected value="">Profissão</option> 
                                <?php do{?>
                                    <option value="<?=$NomProfissao['profissao']?>"><?=$NomProfissao['profissao']?></option>
                                <?php } while($NomProfissao = $execute_profissao -> fetch_assoc())?>
                            </select>

                                <button name="botaoPesquisar" id="botaoPesquisar"><i class="fa-solid fa-magnifying-glass"></i></button>    
   
                        </div>
                        
                    </form>
                </div>
                

                <?php if ($num > 0){?>
                    <div class="table-responsive w-100">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">codigo</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Nascimento</th>
                                    <th scope="col">Sexo</th>
                                    <th scope="col">Filhos</th>
                                    <th scope="col">Profissão</th>
                                    <th scope="col">Telefone</th>
                                    <th scope="col">Avaliação</th>
                                    <th scope="col">Visualizar</th>
                                    <th scope="col">apagar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php do { ?>
                                    <tr>
                                        <td> <?php echo $curriculo['codigo']; ?></td>
                                        <td> <?php echo $curriculo['nome'] ?></td>
                                        <td> <?php echo $curriculo['email'] ?></td>
                                        <td> <?php echo formataData($curriculo['dt_nascimento']) ?></td>
                                        <td> <?php echo $curriculo['sexo'] ?></td>
                                        <td> <?php echo $curriculo['filhos'] ?></td>
                                        <td> <?php echo $curriculo['profissao'] ?></td>
                                        <td> <?php echo $curriculo['contato'] ?></td>


                                        <td>
                                            <star-rater  data-id='<?php echo $curriculo['codigo'];?>'  data-rating='<?php echo $curriculo['avaliacao']?>'></star-rater>  
                                        </td>

                                        <td><a href="/visualizarCurrilo?codigo=<?php echo $curriculo['codigo'];?>&&pag=buscaAvancada "><i class="fa-solid fa-eye"></i></a></td>
                                        <td>
                                            <a name="deletar" onclick="idCurriculo(<?php echo $curriculo['codigo'];?>,'<?php echo $curriculo['nome']; ?>')" id="apagar" href="#"> 
                                                <i class="fa-solid fa-trash-can" data-toggle="modal" data-target="#deleteModal"></i>
                                            </a>
                                        </td>
                                        
                                    </tr>
                                    
                                <?php } while ($curriculo = $execute->fetch_assoc()); ?>
                            </tbody>
                        </table>
                    </div> 
                <?php } else {?>
                   
                        <p style="font-size:25px;font-weight:bold; text-align:center;">nenhum curriculo encontrado!</p>
                 
                <?php }?>

                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        
                        <li class="page-item"><a class="page-link" href="buscaAvancada?pagina=0">Início</a></li>
                            <?php for($i=0; $i<$num_paginas; $i++){
                            $estilo = "";
                            if($pagina == $i)
                                $estilo = "class=\"active\"";
                            ?>
                                <li <?php echo $estilo; ?> class="page-item">
                                <a class="page-link" href="buscaAvancada?pagina=<?php echo $i; ?>&palavra=<?=$txtPesquisa?>"><?php echo $i+1;?></a>
                                </li>

                            <?php }?>  
                        <li class="page-item"><a class="page-link" href="buscaAvancada?pagina=<?php echo $num_paginas-1;?>">Final</a></li>
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
                        <h5 class="modal-title text-white" id="exampleModalLabel">APAGAR CURRICULO</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4 id="mensagem"></h4>
                    </div>
                        
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Apagar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <?php
    require __DIR__ . '../../../layouts/Footer.php';
    ?>


<script src="/public/js/StarRater.js"></script>