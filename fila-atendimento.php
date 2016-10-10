<?php
include 'cabecalho.php';
include './ChamadoDAO.php';
include 'elemento-banco.php';
$elementos = listaElemento($con);

$chamadoDAO = new ChamadoDAO($con);

if (@$_POST['elemento'] == NULL) {
    @$elemQuery = "T";
} else {
    @$elemQuery = $_POST['elemento'];
}

if (@$_POST['status'] == NULL) {
    @$statusQuery = "T";
} else {
    @$statusQuery = $_POST['status'];
}


if ($elemQuery == "T") {
    $elemQuery = "at.id";
}

if ($statusQuery == "T") {
    $statusQuery = "STATUS";
} else {
    $statusQuery = "'" . $statusQuery . "'";
}


$chamadoDAO->setQuery("SELECT 
                ch.id AS nro_chamado, 
                ch.relato,
                cl.id AS id_cliente,
                cl.nome AS cliente, 
                cl.telefone as telefone_cliente,
                at.id AS id_elemento,
                at.nome AS responsavel, 
                IF(STATUS='A','Aguardando atendimento',IF(STATUS='C','Concluido',IF(STATUS='E','Em atendimento',IF(STATUS='X','Cancelado','Status desconhecido')))) AS status,
                DATE_FORMAT(ch.dt_abertura,'%d/%m/%Y') AS dt_abertura
                FROM chamado ch
                INNER JOIN cliente cl ON cl.id = ch.id_cliente
                LEFT JOIN atendente at ON at.id = ch.id_elemento
                WHERE
                at.id = " . $elemQuery . " AND
                STATUS = " . $statusQuery .
        " ORDER BY dt_abertura DESC");

$chamados = $chamadoDAO->listaChamados($chamadoDAO->getQuery());

//print_r($chamados);


if (array_key_exists('removido', $_GET)) {
    echo "<p class='alert-success'>Removido com sucesso</p>";
}
?> 

<div class="row" style="width: 700px">
    <div class="col-md-3 col-xs-12 col-lg-3">
        <?php include_once('sidebar.php'); ?>
    </div>
    <div class="col-md-9 col-xs-12 col-lg-9">
        <div class="container">
            <div class="principal">


                <h3>Fila de atendimento</h3>


                <form method="post" action="fila-atendimento.php">

                    <table class="table">
                        <tr>
                            <td style="width: 200px">Responsável</td>
                            <td>
                                <select class="form-control" name="elemento" style="width: 600px">
                                    <option value="T">Todos</option>
                                    <?php foreach ($elementos as $elemento) { ?>
                                        <option value="<?= $elemento['id'] ?>"><?= $elemento['nome'] ?></option>
                                    <?php } ?>

                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td style="width: 200px">Status</td>
                            <td>
                                <select class="form-control" name="status" style="width: 600px">
                                    <option value="T">Todos</option>
                                    <option value="A">Aguardando atendimento</option>
                                    <option value="C">Concluído</option>
                                    <option value="X">Cancelado</option>
                                </select>
                            </td>
                            <td>                                    
                                <button class="btn btn-primary" style="width: 100px">Pesquisar
                                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                </button>
                            </td>
                        </tr>
                    </table>
                </form>


                <table class="table table-striped table-bordered"> <?php
                    echo "<th>Nº Chamado</th>";
                    echo "<th>Cliente</th>";
                    echo "<th>Responsável</th>";
                    echo "<th>Status</th>";
                    echo "<th>Data de abetura</th>";
                    echo "<th>Ação</th>";


                    foreach ($chamados as $value) {
                        echo "<tr><td>" . $value->getId() . "</td>";
                        echo "<td>" . $value->getCliente()->getNome() . "</td>";
                        echo "<td>" . $value->getElemento()->getNome() . "</td>";
                        echo "<td>" . $value->getStatus() . "</td>";
                        echo "<td>" . $value->getDt_abertura() . "</td>";
                        ?>    
                        <td title="Descrição detalhada do item: <?= $value->getRelato() ?>">

                            <form action="assumindo-chamado.php" method="post">
                                <input type="hidden" name ="id" value="<?= $value->getId() ?>">
                                <input type="hidden" name ="relato" value="<?= $value->getRelato() ?>">
                                <input type="hidden" name ="id_cliente" value="<?= $value->getCliente()->getId() ?>">
                                <input type="hidden" name ="nome_cliente" value="<?= $value->getCliente()->getNome() ?>">
                                <input type="hidden" name ="telefone" value="<?= $value->getCliente()->getTelefone() ?>">
                                <input type="hidden" name ="dt_abertura" value="<?= $value->getDt_abertura() ?>">
                                <input type="hidden" name ="status" value="<?= $value->getStatus() ?>">
                                <?php if ($value->getStatus() == "Aguardando atendimento") { ?>
                                    <button class="btn btn-success" style="width: 100px">Assumir
                                        <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
                                    </button>



                                <?php } else { ?>
                                    <button class="btn btn-primary" style="width: 100px">Visualizar
                                        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                    </button>
                                    <?php
                                }
                                ?>

                            </form>
                        </td>
                        </tr>
                        <?php
                    }
                    ?></table>

            </div>
        </div>
    </div>
</div>

<?php include 'rodape.php' ?>