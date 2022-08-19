<link rel="stylesheet" href="/public/css/visualizarCurriculo.css">
<script src="/assets/js/painelAdmin.js"></script>

<?php
if (!isset($_SESSION)) {
    session_start();
}

// se não existir a sessão retorna para a página de login
include('../../rotas/verificaLogin.php');

require __DIR__ . '/../../layouts/Header.php';
require_once '../../rotas/config.php';

//consulta o curriculo
$sql = "SELECT *FROM curriculo where codigo =" . $_GET['codigo'];
$execute_query = $conexao->query($sql) or die($conexao->error);
$curriculo = $execute_query->fetch_assoc();
$count = 0;

//consulta os cursos
$sql_cursos = "SELECT curso.nome_curso, curso.curso_inicio, curso.curso_conclusao 
from curriculo join curriculo_curso as curso
on curriculo.codigo = curso.cod_curriculo
where curso.cod_curriculo =".$curriculo['codigo'];
$executar = $conexao->query($sql_cursos) or die($conexao->error);
$curso = $executar->fetch_assoc();
$num = $executar->num_rows;

//Consulta certificados
$sql_certificados = "SELECT certificado.caminho, certificado.data_up 
from curriculo join curriculo_upcertificados as certificado
on  curriculo.codigo = certificado.codigo
where certificado.cod_curriculo =".$curriculo['codigo'];
$execute = $conexao->query($sql_certificados) or die($conexao->error);
$certificado = $execute->fetch_assoc();
$num_certificado = $execute->num_rows;

//calcula a idade
$dataNascimento = $curriculo['dt_nascimento'];
$date = new DateTime($dataNascimento);
$idade = $date -> diff( new DateTime( date('Y-m-d') ) );
$idade = $idade -> format( '%Y anos');


function formataData($data){
    $data = str_replace("-", "/", $data);
    print_r(date('d/m/Y', strtotime($data)));
}

?>

    
  

    <div class="container-fluid">
        <div class="row">
            <!--Painel Horizontal-->
            <?php require __DIR__ .'/../../layouts/headerPainel.php';?>

            <div class="col-md-10 mt-4 mb-4">

            <a href="/listarCurriculo"><button class="btn" id="button-voltar"><i class="fa-solid fa-arrow-left"></i> voltar</button></a>

                <div id="curriculo" class="justify-content-center">
                    <p id="titulo">Curriculo <?php echo $curriculo['nome']; ?></p>

                    <div id="cabecalho">
                        <div id="cabecalho1">
                            <ul>
                                <li><p><strong>Nome:</strong> <?php echo $curriculo['nome']; ?></p></li>
                                <li><p><strong>Idade:</strong> <?php echo $idade; ?></p></li>
                                <li><p><strong>Sexo:</strong> <?php echo $curriculo['sexo']; ?></p></li>
                                <li><p><strong>Email:</strong> <?php echo $curriculo['email']; ?> / Contato: <?php echo $curriculo['contato']; ?></p></li>
                            </ul>
                        </div>

                        <hr>
                        <div id="cabecalho2">
                            <ul>
                            <li><p><strong>estadocivil:</strong> <?php echo $curriculo['estadocivil']; ?></p></li>
                            <li><p><strong>Filhos:</strong> <?php echo $curriculo['filhos']; ?></p></li>
                            <li><p><strong>Deficiência:</strong> <?php echo $curriculo['PCD']; ?></p></li>
                            </ul>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div id="endereco">
                        <p id="titulo">Endereço</p>
                        <ul>
                            <li><p><strong>Cep:</strong> <?php echo $curriculo['cep']; ?></p></li>
                            <li><p><strong>Logradouro:</strong> <?php echo $curriculo['logradouro']; ?></p></li>
                            <li><p><strong>N°:</strong> <?php echo $curriculo['numero_casa']; ?></p></li>
                            <li><p><strong>Complemento:</strong> <?php echo $curriculo['complemento']; ?></p></li>
                            <li><p><strong>Bairro:</strong> <?php echo $curriculo['bairro']; ?></p></li>
                            <li><p><strong>Cidade:</strong> <?php echo $curriculo['cidade']; ?></p></li>
                            <li><p><strong>Estado:</strong> <?php echo $curriculo['UF_estado']; ?></p></li>
                        </ul>
                    </div>

                    <hr>

                    <div id="apresentacao">
                        <p id="titulo">Apresentação</p>
                        <ul>
                            <li><p><strong>Apresentacao:</strong> <?php echo $curriculo['apresentacao']; ?></p></li>
                            <li><p><strong>Habilidades:</strong> <?php echo $curriculo['habilidades']; ?></p></li>
                            <li><p><strong>Experiencia:</strong> <?php echo $curriculo['experiencia']; ?></p></li>
                            <li><p><strong>Profissão:</strong> <?php echo $curriculo['profissao']; ?></p></li>
                        </ul>
                    </div>

                    
                    
                    <hr>

                    <div id="formacao">
                        <p id="titulo">Formação</p>
                        <ul>
                            <li><p><strong>formacão Academica:</strong> <?php echo $curriculo['formacao_academica']; ?></p></li>
                            <li><p><strong>Início:</strong> <?php echo formataData($curriculo['formacao_inicio']); ?></p></li>
                            <li><p><strong>Conclusão:</strong> <?php echo formataData($curriculo['formacao_conclusao']); ?></p></li>
                            <li><p><strong>Complemento:</strong> <?php echo $curriculo['formacao_complemento']; ?></p></li>
                        </ul>
                    </div>

                    <hr>
                    <!--Visualizar certificados-->
                    <div id="cursos">
                        <p id="titulo">Cursos</p>
                        
                        <?php if($num>0){ ?>
                            <?php do {?>
                            <ul>
                                    <li>
                                        <p> 
                                            <span><strong>Nome:</strong> <?php print_r($curso['nome_curso']); ?></span>  
                                            <span><strong>Data Início:</strong> <?php formataData($curso['curso_inicio']); ?></span>
                                            <span><strong>Data Conclusão:</strong> <?php formataData($curso['curso_conclusao']);?></span>
                                        </p>
                                    </li>
                                </ul>
                            
                            <?php } while($curso = $executar->fetch_assoc());?>   

                            <?php } else {?>
                                <ul>
                                    <li>
                                    <p><span><strong>Não possui cursos</strong></span></p>
                                    </li>
                                </ul>
                            <?php }?>
                        </div>

                    <hr>
                        
                    <div id="certificaUp">
                        <p id="titulo">certificados</p>
                        <?php if($num_certificado>0){?>
                           
                        <?php do{$count++?>   
                        <ul>
                            <li>
                                <p> 
                                    <a href="" data-toggle="modal" data-target="#visualizarModal" onclick="visualizar('<?php echo($certificado['caminho']);?>',  <?php echo $count;?>)"><strong>Certificado(<?php echo $count;?>) : </strong><span>Visualizar</span></a>
                                    <span><strong>Data de upload:</strong> <?php print_r($certificado["data_up"]);?></span>
                                </p>
                               
                            </li>
                        </ul>
                        <!--<img src="<?php print_r($certificado["caminho"]);?>" alt="<?php echo $nomeArquivo['basename']?>">-->
 
                        <?php } while($certificado = $execute->fetch_assoc());  ?>
                        <?php } else{?> 
                            <ul>
                                <li><p><span><strong>Não possui Certificados</strong></span></p></li>
                            </ul>
                        <?php }?>
                    </div>
                </div>
            </div>
            
            <!--Fazer modal para visualizar curriculo-->
           <form id="visualizar" method='post' enctype='multipart/form-data'>
                   <div class="modal fade" id="visualizarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                       <div class="modal-dialog" role="document">
                           <div class="modal-content">
                               <div class="modal-header bg-success pt-1 pb-1">
                                   
                                   <div class="modal-body text-white pt-1 pb-0 text-center">
                                       <h6 id="mensagem"></h6>
                                   </div> 
        
                                   <button type="button"  class="close shadow-none" data-dismiss="modal" aria-label="fechar">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                                   
                               </div>
                               
                               <!--<img src="" id="caminhoCertificado" alt="">-->
                              
                               
                                   <a class="text-center" href="" id="caminhoCertificado" download="Certificado_<?php echo $curriculo['nome'];?>"><i class="ml-2 mr-2 fa-solid fa-arrow-down"></i>Clique aqui para fazer o download</a>
                              

                               
                               <div class="modal-footer pt-0 pb-0">
                                   <button type="button" class="btn btn-danger btn-sm " data-dismiss="modal">Fechar</button>
                               </div>
                           </div>
                       </div>
                   </div>

               </form>                       
        
            </div>
            
    </div>
    
    
    <?php
    require __DIR__ . '../../../layouts/Footer.php';
    ?>
