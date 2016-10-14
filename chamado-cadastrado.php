<?php
include 'cabecalho.php';
include 'chamadoDAO.php';
$chamadoDAO = new chamadoDAO($con); // aqui ele ja cria a conexao
$ch = new Chamado();
$cl = new Cliente();
$at = new Atendente();
$el = new Elemento();

$ch->setRelato($_POST['relato']);
$ch->setDt_abertura($_POST['dt_abertura']);

$cl->setId($_POST['cliente']);
$at->setId($_POST['id_atend']);
$el->setId($_POST['elemento']);

$ch->setAtendente($at);
$ch->setCliente($cl);
$ch->setElemento($el);
?>
<div class="container">
    <div class="principal">
        <p class="alert-success">
            <?php if ($chamadoDAO->insereChamado($ch)) { ?>
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times</a>
                <strong></strong>Chamado Cadastrado com sucesso!
            </div>
        <?php } else { ?>
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times</a>
                <strong>Ops, ocorreu um erro!</strong>Ocorreu um erro ao inserir o chamado no banco de dados. Entre em contato com o administrador do sistema.
            </div>
        <?php } ?>
        </p>
        <div class="jumbotron">
            <p><a class="btn btn-primary btn-lg" href="novo-chamado.php" role="button">Voltar</a></p>
        </div>
    </div>
</div>

<?php include 'rodape.php' ?>