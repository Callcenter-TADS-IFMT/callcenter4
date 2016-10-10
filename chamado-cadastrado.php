<?php
include 'cabecalho.php';
include 'chamadoDAO.php';

$chamadoDAO = new chamadoDAO($con); // aqui ele ja cria a conexao
//$produtos = $produtoDAO->listaProdutos();

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
            <div class="text-success">
                <div class="previous">
                    <p class="alert-success"> 
                        Chamado cadastrado com sucesso! <br/>
                    </p>
                </div>
            </div>


        <?php } else { ?>
            <div class="text-danger">
                <div class="previous">
                    <p class="alert-danger"> 
                        Erro ao cadastrar o chamado! <br/>
                    </p>
                </div>
            </div>


        <?php } ?>
        </p>
        <div class="jumbotron">
            <p><a class="btn btn-primary btn-lg" href="novo-chamado.php" role="button">Novo chamado</a></p>
        </div>
    </div>
</div>

<?php include 'rodape.php' ?>