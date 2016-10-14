<?php
include 'conecta.php';

function carregaArquivo($nomeArquivo) {
require_once ('model/' . $nomeArquivo . '.php');
}
spl_autoload_register("carregaArquivo");
$_SESSION['idus'];
$_SESSION['tipo'];
$_SESSION['nome'];

$id_atendente = $_SESSION['idus'];
$usuario = $_SESSION['nome'];
$tipo = $_SESSION['tipo'];

if ($_SESSION['logado'] == "false") {
header('Location: login.php');
die();
}

?>
<html>
    <head>
        <meta charset="utf-8"/>
        <link href="css/bootstrap.css" rel="stylesheet"/>
        <link href="css/style.css" rel="stylesheet"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <form method="post" action="logoff.php">
            <div class="navbar navbar-fixed-top" style="background-color: #23527c;height: 60px">
                <div class="container">
                    <div class="navbar-fixed-top">
                        <a style="margin-right: 700px" class="navbar-brand" href="index.php">
                            <img alt="Brand" src="pictures/call.png" style="width: 30px">
                        </a>
                        <h4 style="color: lightyellow">Callcenter 1.0 - Usuário atual: <?= $usuario ?>
                            <div class='btn-group'>
                                <a href='logoff.php' class='btn btn-danger' ><i class='glyphicon glyphicon-off'></i> Sair</a>
                            </div>
                        </h4>
                    </div>
                </div>
            </div>
        </form>