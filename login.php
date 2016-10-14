<?php
include 'conecta.php';
include './UsuarioDAO.php';
include './model/Usuario.php';

$usuarioDAO = new UsuarioDAO($con);

@$usuarioDAO->setQuery("SELECT * from atendente where login ='" . $_POST['login'] . "' and senha = '" . $_POST['senha'] . "'");

$atendentes = $usuarioDAO->listaUsuarios($usuarioDAO->getQuery());


foreach ($atendentes as $values) {
    $_SESSION['tipo'] = $values->getTipo();
    $_SESSION['nome'] = $values->getNom();
    $_SESSION['idus'] = $values->getIdUs();
}


if (!empty($_POST['login'])) {
    if (count($atendentes) > 0) {
        header('Location: index.php');
        $_SESSION['usuario'] = $atendentes;
        $_SESSION['logado'] = "true";
        die();
    } else {
        $_SESSION['logado'] = "false";
        ?>
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times</a>
            <strong>Acesso negado!</strong> Usuário ou senha inválida! Por favor tente novamente.
        </div>
        <?php
    }
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
    <body style="background-color: #31b0d5">

        <form method="post" action="login.php">

            <div class="container col-md-4 col-lg-offset-4 ">
                <table style="margin-top: 200px">

                    <tr>
                        <td><img src="pictures/tads-logo2.png" /><br/></td>
                    </tr>

                    <tr>
                        <td><input class="form-control" type="text" name="login" placeholder="Usuário" /><br/></td>
                    </tr>
                    <tr>
                        <td><input class="form-control" type="password" name="senha" placeholder="Senha"/><br/></td>
                    </tr>
                    <tr>
                        <td><input style="width: 300px" class="btn btn-primary" type="submit" value="Entrar"/></td>
                    </tr>
                </table>

            </div>
        </form>
        <?php include './rodape.php' ?>