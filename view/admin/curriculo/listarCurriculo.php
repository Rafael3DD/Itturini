<?php
if (!isset($_SESSION)) {
    session_start();
}

// se não existir a sessão retorna para a página de login
include('../../rotas/verificaLogin.php');


require __DIR__ . '/../../layouts/Header.php';
require_once '../../rotas/config.php';

//Campo pesquisa
if (isset($_POST['botaoPesquisar'])) {
    $txtPesquisa = trim((isset($_POST['campoPesquisar'])) ? $_POST['campoPesquisar'] : "");
} else {
    $txtPesquisa = trim((isset($_GET['palavra'])) ? $_GET['palavra'] : "");
}

//Paginação
//pegando dados do banco
$itens_por_pagina = 9;
$pagina = 0;
if (isset($_GET['pagina'])) {
    $pagina = intval($_GET['pagina']);
}

$inicio = $pagina * $itens_por_pagina;

$sql = "SELECT *FROM curriculo WHERE nome like '%{$txtPesquisa}%' ORDER BY nome LIMIT $inicio, $itens_por_pagina";
$execute = $conexao->query($sql) or die($conexao->error);
$curriculo = $execute->fetch_assoc();
$num = $execute->num_rows;

//quantidade total de objetos
$num_total = $conexao->query("SELECT *FROM curriculo WHERE nome like '%{$txtPesquisa}%'")->num_rows;
$num_paginas = ceil($num_total / $itens_por_pagina);



$conexao->close();


?>


<script src="https://kit.fontawesome.com/f1adbfc707.js" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700|Spartan:300,400,700|Ubuntu:300,400&display=swap" rel="stylesheet">

<div class="container-fluid">
    <div class="row">

        <!--Painel Horizontal-->
        <?php require __DIR__ . '/../../layouts/headerPainel.php'; ?>



        <div class="col-md-10 mt-4 mx-auto ">
            <a href="/painelCurriculo"><button class="btn" id="button-voltar"><i class="fa-solid fa-arrow-left"></i> voltar</button></a>

            <a href="/buscaAvancada"><button class="btn" id="busca-avancada"><i class="fa-solid fa-magnifying-glass"></i> Busca Avançada</button></a>


            <?php
            if (isset($_SESSION['curriculo_deletado'])) :
            ?>
                <div class="alert alert-success w-50 mx-auto text-center" role="alert">
                    <p>Curriculo de <strong><?php echo $_SESSION['nome']; ?></strong> deletado com sucesso!</p>
                </div>
            <?php
            endif;
            unset($_SESSION['curriculo_deletado']);
            ?>


            <div class="container justify-content-center">
                <form action="listarCurriculo?pagina=0" method="POST">
                    <div class="row mx-auto text-center w-100 justify-content-center">

                        <div class="" style="width:75%; margin:0; text-align:center;">
                            <input type="text" value="<?= $txtPesquisa ?>" class="form-control shadow-none" name="campoPesquisar" id="campoPesquisar" placeholder="Digite o nome">
                        </div>

                        <div class="" style="width:5%; margin:0;">
                            <button name="botaoPesquisar" id="botaoPesquisar"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>

                    </div>
                </form>
            </div>

            <?php if ($num > 0) { ?>
                <div class="table-responsive w-100">

                    <table class="table table-striped table-sm w-100">
                        <thead>
                            <tr>
                                <th scope="col">codigo</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Avaliação</th>
                                <th scope="col">Visualizar</th>
                                <th scope="col">Apagar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php do { ?>
                                <tr>
                                    <td> <?php echo $curriculo['codigo']; ?></td>
                                    <td> <?php echo $curriculo['nome'] ?></td>
                                    <td> <?php echo $curriculo['email'] ?></td>
                                    <td> <?php echo $curriculo['contato'] ?></td>

                                    <td>
                                        <star-rater  data-id='<?php echo $curriculo['codigo'];?>'  data-rating='<?php echo $curriculo['avaliacao']?>'></star-rater>  
                                    </td>

                                    <td><a href="/visualizarCurrilo?codigo=<?php echo $curriculo['codigo']; ?>"><i class="fa-solid fa-eye"></i></a></td>
                                    <td>
                                        <a name="deletar" onclick="idCurriculo(<?php echo $curriculo['codigo']; ?>,'<?php echo $curriculo['nome']; ?>')" id="apagar" href="#">
                                            <i class="fa-solid fa-trash-can" data-bs-toggle="modal" data-bs-target="#deleteModal"></i>
                                        </a>
                                    </td>


                                </tr>

                            <?php } while ($curriculo = $execute->fetch_assoc()); ?>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>

                <p style="font-size:25px;font-weight:bold; text-align:center;">nenhum curriculo encontrado!</p>

            <?php } ?>

            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">

                    <li class="page-item"><a class="page-link" href="listarCurriculo?pagina=0">Início</a></li>
                    <?php for ($i = 0; $i < $num_paginas; $i++) {
                        $estilo = "";
                        if ($pagina == $i)
                            $estilo = "class=\"active\"";
                    ?>
                        <li <?php echo $estilo; ?> class="page-item">
                            <a class="page-link" href="listarCurriculo?pagina=<?php echo $i; ?>&palavra=<?= $txtPesquisa ?>"><?php echo $i + 1; ?></a>
                        </li>

                    <?php } ?>
                    <li class="page-item"><a class="page-link" href="listarCurriculo?pagina=<?php echo $num_paginas - 1; ?>">Final</a></li>
                </ul>
            </nav>

        </div>
    </div>
</div>

<!--<div class="star-rater">
    <span class="span" data-value="1">&#9733</span>
    <span class="span" data-value="1">&#9733</span>
    <span class="span" data-value="1">&#9733</span>
    <span class="span" data-value="1">&#9733</span>
    <span class="span" data-value="1">&#9733</span>
</div>-->

<!--Modal exclusão de curriculo-->
<form id="deleteform" method='post' enctype='multipart/form-data'>
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white " id="exampleModalLabel">APAGAR CURRICULO</h5>
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
require __DIR__ . '../../../layouts/Footer.php';
?>

<script src="/public/js/modalExclusao.js"></script>

<script src="/public/js/StarRater.js"></script>
<script>
   function PassaValores(avaliacao, id){
        //console.log('id '+id);
        //console.log('avaliacao '+avaliacao);
        
        const el = document.querySelector("#estrela_avaliacao");
        const dataId = el.getAttribute("data-rating");
        console.log(dataId); // 123456
   }
    //esconde a mensagem
    $().ready(function() {
        setTimeout(function() {
            $('.alert').hide(); // "foo" é o id do elemento que seja manipular.
        }, 3000); // O valor é representado em milisegundos.
    });
</script>