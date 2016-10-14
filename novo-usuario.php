<?php
include_once('cabecalho.php');
include './UsuarioDAO.php';

$usuararioDAO = new UsuarioDAO($con);

$at = new Usuario();

@$at->setId($_POST['id']);
@$at->setNome($_POST['nome']);
@$at->setTelefone($_POST['telefone']);
@$at->setLogin($_POST['login']);
@$at->setSenha($_POST['senha']);
@$at->setTipo($_POST['tipo']);
@$at->setAtivo($_POST['ativo']);

if (!empty($_POST['nome'])) {
    $usuararioDAO->insereUsuario($at);
    ?>
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times</a>
        <strong>Sucesso!</strong><?=$at->getNom()?> foi cadastrado com sucesso como um usuário do tipo <?= $at->getTipo()?>!
    </div>

    <?php
}
?>
<div class="row" style="width: 700px">
    <div class="col-md-3 col-xs-12 col-lg-3">
        <?php include_once('sidebar.php'); ?>
    </div>
    <div class="col-md-9 col-xs-12 col-lg-9">
        <div class="container">
            <div class="principal">
                <h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Cadastro de usuário</h3>
                <form method="post" action="novo-usuario.php">
                    <table class="table">
                        <tr>
                            <td style="width: 200px">Nome completo </td>
                            <td>
                                <input name="nome" class="form-control" style="width: 600px"/>
                            </td>
                        </tr> 
                        <tr>
                            <td style="width: 200px">Telefone </td>
                            <td>
                                <input name="telefone" class="form-control" style="width: 600px"/>
                            </td>
                        </tr>                        
                        <tr>
                            <td style="width: 200px">Tipo de usuário</td>
                            <td>
                                <select name="tipo" class="form-control" name="elemento" style="width: 600px">
                                    <option value="admin">Administador</option>
                                    <option value="atendente">Atendente / Telefonista</option>
                                    <option value="suporte">Suporte Técnico</option>
                                </select>
                            </td>
                        </tr> 
                        <tr>
                            <td style="width: 200px">Login </td>
                            <td>
                                <input name="login" class="form-control" style="width: 600px"/>
                            </td>
                        </tr>  
                        <tr>
                            <td style="width: 200px">Senha </td>
                            <td>
                                <input name = "senha" type="password" class="form-control"  placeholder="Senha" style="width: 600px">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 200px">Confirmar senha </td>
                            <td>
                                <input name = "senha2" type="password" class="form-control" placeholder="Confirmar senha" style="width: 600px">
                            </td>
                        </tr>
                        <tr style="text-align: center">
                            <td/>
                            <td><button class="btn btn-primary" style="width: 300px">Cadastrar Usuário
                                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true" onclick="javascript: location.href = 'assumindo-chamado.php';"></span>
                                </button>                        

                            </td>
                        </tr>
                        <input type="hidden" name ="ativo" value="1">
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'rodape.php' ?>