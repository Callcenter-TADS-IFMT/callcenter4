<?php
include_once('cabecalho.php');
include 'cliente-banco.php';
include 'elemento-banco.php';
include 'atendente-banco.php';
$clientes = listaCliente($con);
$elementos = listaElemento($con);
$atendentes = listaAtendente($con);
?>
<div class="row" style="width: 700px">
    <div class="col-md-3 col-xs-12 col-lg-3">
        <?php include_once('sidebar.php'); ?>
    </div>
    <div class="col-md-9 col-xs-12 col-lg-9">
        <div class="container">
            <div class="principal">
                <h3><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> Cadastro de atendimento</h3>
                <form method="post" action="chamado-cadastrado.php">

                    <table class="table">
                        <tr>
                            <td style="width: 200px">Atendente </td>
                            <td>
                                <input name="atendente" class="form-control" value="<?= $usuario ?>" style="width: 600px"/>
                                <input type="hidden" name ="id_atend" value="<?= $id_atendente ?>">
                            </td>
                        </tr>  

                        <tr>
                            <td style="width: 200px">Cliente </td>
                            <td>
                                <select class="form-control" name="cliente" style="width: 600px">
                                    <?php foreach ($clientes as $cliente) { ?>
                                        <option value="<?= $cliente['id'] ?>"><?= $cliente['nome'] ?></option>
                                    <?php } ?>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Relato do problema</td>
                            <td><textarea name="relato" style="width: 600px" class="form-control" name="descricao" ></textarea></td>
                        </tr>

                        <tr>
                            <td>Elemento do suporte</td>
                            <td>
                                <select class="form-control" name="elemento" style="width: 600px">
                                    <?php foreach ($elementos as $elemento) { ?>
                                        <option value="<?= $elemento['id'] ?>"><?= $elemento['nome'] ?></option>

                                    <?php } ?>

                                </select>
                            </td>

                        </tr>

                        <tr>
                            <td>Data/hora Abertura</td>
                            <td>
                                <?php
                                $date = date('Y-m-d H:i:s');
                                ?>
                                <input name="dt_abertura" value="<?php echo $date ?>" class="form-control" style="width: 600px"/>

                            </td>

                        </tr>

                        <tr style="text-align: center">
                            <td/>
                            <td><button class="btn btn-primary" style="width: 300px">Adicionar à fila
                                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true" onclick="javascript: location.href = 'assumindo-chamado.php';"></span>
                                </button>                        

                            </td>
                        </tr>

                    </table>

                </form>

            </div>
        </div>
    </div>
</div>

<?php include 'rodape.php' ?>