<?php
if (!isset($_SESSION)) {
    session_start();
}
require __DIR__ . '/../../layouts/Header.php';
include('../../rotas/verificaLogin.php');
require_once '../../rotas/config.php';
?>
<div class="container-fluid">
    <div class="row">

        <!--Painel Horizontal-->
        <?php require __DIR__ . '/../../layouts/headerPainel.php'; ?>


        <div class="col-md-10 mt-4">
            <div class="table-responsive w-100">

                <table class="table table-striped table-sm w-100">
                    <thead>
                        <tr>
                            <th scope="col">Níveis</th>                        
                        </tr>
                    </thead>
                    <tbody>          
                        <tr> <td> 1 - Admin   </td></tr>
                        <tr> <td> 2 - Padrão </td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
require __DIR__ . '/../../layouts/Footer.php';
?>