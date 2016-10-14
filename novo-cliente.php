<?php
include_once('cabecalho.php');
include './ClienteDAO.php';

$clienteDAO = new ClienteDAO($con);

$cl = new Cliente();

@$cl->setId($_POST['id']);
@$cl->setNome($_POST['nome']);
@$cl->setTelefone($_POST['telefone']);
@$cl->setTelefone2($_POST['telefone2']);
@$cl->setPessoa($_POST['pessoa']);
@$cl->setEmail($_POST['email']);
@$cl->setContato($_POST['contato']);
@$cl->setEndereco($_POST['endereco']);
@$cl->setCidade($_POST['cidade']);
@$cl->setEstado($_POST['estado']);

if (!empty($_POST['nome'])) {
    $clienteDAO->insereCliente($cl);
    
    ?>
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times</a>
        <strong>Sucesso!</strong>O cliente <?=$cl->getNome()?> foi cadastrado com sucesso!
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

                <h3><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Cadastro de clientes</h3>
                <form method="post" action="novo-cliente.php">

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
                            <td style="width: 200px">Celular </td>
                            <td>
                                <input name="telefone2" class="form-control" style="width: 600px"/>
                            </td>
                        </tr>  

                        <tr>
                            <td style="width: 200px">Pessoa</td>
                            <td>
                                <select name="pessoa" class="form-control" name="elemento" style="width: 600px">
                                    <option value="fisica">Pessoa Física</option>
                                    <option value="juridica">Pessoa Jurídica</option>
                                </select>
                            </td>
                        </tr> 

                        <tr>
                            <td style="width: 200px">E-mail </td>
                            <td>
                                <input name="email" type="email" class="form-control" style="width: 600px"/>
                            </td>
                        </tr>  

                        <tr>
                            <td style="width: 200px">Contato </td>
                            <td>
                                <input name = "contato" class="form-control"  style="width: 600px">
                            </td>
                        </tr>

                        <tr>
                            <td style="width: 200px">Endereço </td>
                            <td>
                                <input name = "endereco" class="form-control"  style="width: 600px">
                            </td>
                        </tr>

                        <tr>
                            <td style="width: 200px">Cidade </td>
                            <td>
                                <input name = "cidade" class="form-control"  style="width: 600px">
                            </td>
                        <tr>
                            <td>Estado</td>

                            <td>
                                <select name="estado" class="form-control" name="elemento" style="width: 180px">
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá </option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espírito Santo</option>                                    
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MG">Minhas Gerais</option>                                  
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="PA">Pará</option>                                   
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>                                 
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>                                    
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>                                  
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>                                   
                                    <option value="TO">Tocantins</option>
                                </select>
                        </tr>
                        <tr style="text-align: center">

                            <td><button class="btn btn-primary" style="width: 200px">Cadastrar Cliente
                                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
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