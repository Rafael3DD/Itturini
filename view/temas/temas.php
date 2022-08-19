<link rel="stylesheet" href="/public/css/temas.css">

<?php


require __DIR__ . '/../layouts/Header.php';
include '../rotas/config.php';

$sql = "SELECT * FROM tema";
$buscar = $conexao->query($sql) or die($conexao->error);
$dados = mysqli_fetch_assoc($buscar);

?>

<div class="col-12 pag-titulo mb-2">Temas</div>

<div id="temas">
<div class="container text-center ">
   <div class="row justify-content-center">
         <?php do{ ?>
            <div class="col-3 ">
               <div class="card" >
               <img src="<?= $dados['imagem']?>" class="card-img-top" alt="...">
               <div class="card-body">
                  <h5 class="card-title"><?php echo $dados['titulo'];?></h5>
                  <a href="/temaEscolhido?cod=<?=$dados['codigo']?>" class="btn btn-primary">Vizualizar</a>
               </div>
            </div>
         </div>
         <?php } while($dados = mysqli_fetch_assoc($buscar));?> 
   </div>
</div>
</div>
<?php
require __DIR__ . '/../layouts/Footer.php';
?>