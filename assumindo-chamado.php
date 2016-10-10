
<?php
include_once('cabecalho.php');
include './ChamadoDAO.php';
include './TramiteDAO.php';

$tramiteDAO = new TramiteDAO($con);

$tramiteDAO->setQuery("SELECT id,hora_ini,hora_fin,tramite,solucao,id_chamado, DATE_FORMAT(data,'%d/%m/%Y') AS data FROM tramite WHERE id_chamado=" . $_POST['id']);

$tramites = $tramiteDAO->listaTramites($tramiteDAO->getQuery());


@$atualiza = $_POST['atualiza'];
@$novoTramite = $_POST['novo_tramite'];
?>

<?php
$chamadoDAO = new ChamadoDAO($con);

@$ch = new Chamado();
@$cl = new Cliente();
@$ch->setId($_POST['id']);
@$ch->setDt_abertura($_POST['dt_abertura']);
@$ch->setRelato($_POST['relato']);
@$ch->setStatus($_POST['status']);

$cl->setNome($_POST['nome_cliente']);
$cl->setId($_POST['id_cliente']);
$cl->setTelefone($_POST['telefone']);
$ch->setCliente($cl);

if ($atualiza == true) {


    if ($chamadoDAO->assumeChamado($ch->getId())) {
        //procurar java scrpit para caixa de dialogo
    } else {
        
    }
}

if ($ch->getStatus() == "Aguardando atendimento") {
    $atualiza = false;
} else {
    $atualiza = true;
}




$tr = new Tramite();

@$tr->setHora_ini($_POST['hora_ini']);
@$tr->setHora_fin($_POST['hora_termino']);
@$tr->setTramite($_POST['add_tramite']);

if (array_key_exists('solucao', $_POST)) {
    $tr->setSolucao('true');
} else {
    $tr->setSolucao('false');
}

$tr->setId_chamado($ch->getId());

if ($novoTramite == true) {

    if ($tramiteDAO->insereTramite($tr)) {
        //procurar java scrpit para caixa de dialogo
    } else {
        echo "Não está dando certo!";
    }

    if ($tr->getSolucao() == true) {
        $chamadoDAO->encerraChamado($ch->getId());
    }
}
?>

<div class="row" style="width: 700px">
    <div class="col-md-3 col-xs-12 col-lg-3">
        <?php include_once('sidebar.php'); ?>
    </div>
    <div class="col-md-9 col-xs-12 col-lg-9">
        <div class="container">
            <div class="principal">

                <table class="table">

                    <tr>
                        <td><h3>Chamado <?= $ch->getId() ?></h3></td>
                        <td>

                        </td>
                    </tr>  
                </table>

                <form method="post" action="assumindo-chamado.php">
                    <input type="hidden" name ="id" value="<?= $ch->getId() ?>">
                    <input type="hidden" name ="relato" value="<?= $ch->getRelato() ?>">
                    <input type="hidden" name ="id_cliente" value="<?= $ch->getCliente()->getId() ?>">
                    <input type="hidden" name ="nome_cliente" value="<?= $ch->getCliente()->getNome() ?>">
                    <input type="hidden" name ="telefone" value="<?= $ch->getCliente()->getTelefone() ?>">
                    <input type="hidden" name ="dt_abertura" value="<?= $ch->getDt_abertura() ?>">
                    <input type="hidden" name ="status" value="Em atendimento">
                    <input type="hidden" name ="atualiza" value="true">
                    <input type="hidden" name ="novo_status" value="E">

                    <?php
                    if ($atualiza == true) {
                        ?>
                        <button style="width: 200px" disabled="true" class="btn btn-primary">Assumir Chamado
                            <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                        </button>

                    <?php } else { ?>

                        <button style="width: 200px" class="btn btn-primary">Assumir Chamado
                            <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></button>
                    <?php } ?>
                    <input style="width: 200px" type="button" class="btn btn-primary" value="Voltar à lista <<" onclick="javascript: location.href = 'fila-atendimento.php';" />
                </form>              



                <table class="table">

                    <tr>
                        <td style="width: 200px">Status Chamado </td>
                        <td>
                            <input readonly="readonly" name="status" class="form-control" value="<?= $ch->getStatus() ?>" style="width: 600px"/>
                        </td>
                    </tr>  


                    <tr>
                        <td style="width: 200px">Nome cliente </td>
                        <td>
                            <input readonly="readonly" name="cliente" class="form-control" value="<?= $ch->getCliente()->getNome() ?>" style="width: 600px"/>
                        </td>
                    </tr>  


                    <tr>
                        <td style="width: 200px">Telefone </td>
                        <td>
                            <input readonly="readonly" name="telefone" class="form-control" value="<?= $ch->getCliente()->getTelefone() ?>" style="width: 600px"/>
                        </td>
                    </tr> 

                    <tr>
                        <td>Relato do problema</td>
                        <td><textarea readonly="readonly" name="relato" style="width: 600px" class="form-control"><?= $ch->getRelato() ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Data/hora Abertura</td>
                        <td>

                            <input readonly="readonly" name="dt_abertura" class="form-control" value="<?= $ch->getDt_abertura() ?>" style="width: 600px"/>

                        </td>
                    </tr>

                </table>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Trâmites do chamado</h3>
                    </div>
                    <div class="panel-body">

                        <form method="post" action="assumindo-chamado.php">
                            <table class="table">

                                <tr>
                                    <td style="width: 150px">Hora início</td>
                                    <td>
                                        <input name="hora_ini" class="form-control" type="time" style="width: 100px"/>
                                    </td>
                                    <td style="width: 150px">Hora término</td>
                                    <td>
                                        <input name="hora_termino" class="form-control"  type="time" style="width: 100px"/>
                                    </td>
                                </tr> 
                            </table>
                            <table class="table">
                                <td style="width: 100px">Tramite</td>
                                <td style="width: 400px">
                                    <textarea name="add_tramite" style="width: 600px" class="form-control"></textarea>
                                </td>

                                <tr>
                                    <td style="width: 100px">
                                        <input type="checkbox" name="solucao" value="true"> Solução?
                                    </td>
                                    <td style="width: 100px">

                                        <input type="hidden" name ="novo_tramite" value="true">
                                        <input type="hidden" name ="id" value="<?= $ch->getId() ?>">
                                        <input type="hidden" name ="relato" value="<?= $ch->getRelato() ?>">
                                        <input type="hidden" name ="id_cliente" value="<?= $ch->getCliente()->getId() ?>">
                                        <input type="hidden" name ="nome_cliente" value="<?= $ch->getCliente()->getNome() ?>">
                                        <input type="hidden" name ="telefone" value="<?= $ch->getCliente()->getTelefone() ?>">
                                        <input type="hidden" name ="dt_abertura" value="<?= $ch->getDt_abertura() ?>">





                                        <?php
                                        if (@$_POST['novo_status'] == "E" || $ch->getStatus() == "Em atendimento") {
                                            ?>
                                            <button class="btn btn-primary">Adicionar
                                                <span class="glyphicon glyphicon-plus-sign" aria-hidden="true" onclick="javascript: location.href = 'assumindo-chamado.php';"></span>
                                            </button>

                                        <?php } else { ?>

                                            <button disabled="true" class="btn btn-primary">Adicionar
                                                <span class="glyphicon glyphicon-plus-sign" aria-hidden="true" onclick="javascript: location.href = 'assumindo-chamado.php';"></span>
                                            </button>
                                        <?php } ?>







                                    </td>
                                </tr>  
                            </table>
                        </form>

                        <table class="table table-striped table-bordered"> <?php
                            echo "<th>Data</th>";
                            echo "<th>Hora Inicio</th>";
                            echo "<th>Hora Termino</th>";
                            echo "<th>Tramite</th>";
                            echo "<th>Solucionado</th>";

                            foreach ($tramites as $value) {
                                echo "<tr><td>" . $value->getData() . "</td>";
                                echo "<td>" . $value->getHora_ini() . "</td>";
                                echo "<td>" . $value->getHora_fin() . "</td>";
                                echo "<td>" . $value->getTramite() . "</td>";
                                echo "<td>";
                                if ($value->getSolucao() == 1) {
                                    ?> 
                                    <input disabled="true" style="width: 30px" type="checkbox" name="solucao" value="true" checked="true">
                                    <?php
                                } else {
                                    ?>
                                    <input disabled="true" style="width: 30px" type="checkbox" name="solucao" value="false">    
                                    <?php
                                }
                                ?>
                                <?php
                            }
                            ?></table>




                    </div>
                </div>







            </div>
        </div>
    </div>
</div>

<?php include 'rodape.php' ?>