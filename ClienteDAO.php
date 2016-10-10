<?php

//essa classe elimina a necessidade do arquivo ProdutosDb.php

class ClienteDAO {

    private $conexao; // isso é uma propriedade
    private $query;

    function getQuery() {
        return $this->query;
    }

    function setQuery($query) {
        $this->query = $query;
    }

    function __construct($con) { // esse con é o parametro que será recebido            são duas underline mesmo!
        $this->conexao = $con;
    }

    function listaCliente($query) { // removi o parametro con de dentro do parametroes
        $this->conexao;
        $clientes = Array();
        $sql = $query;
       // echo $sql;
        $resultado = mysqli_query($this->conexao, $sql);
        while ($cliente = mysqli_fetch_assoc($resultado)) {

            $cl = new Cliente();

            $cl->setId($cliente['id']);
            $cl->setNome($cliente['nome']);
            $cl->setTelefone($cliente['telefone']);
            $cl->setLogin($cliente['login']);
            $cl->setSenha($cliente['senha']);
            $cl->setAtivo($cliente['ativo']);
            array_push($clientes, $cl);
        }
        return $clientes;
    }

    function insereCliente(Cliente $cl) {
        $sql = "INSERT INTO cliente (nome,telefone,telefone2,pessoa,email,contato,endereco,cidade,estado) "
                . "VALUES ('{$cl->getNome()}','{$cl->getTelefone()}','{$cl->getTelefone2()}','{$cl->getPessoa()}','{$cl->getEmail()}','{$cl->getContato()}','{$cl->getEndereco()}','{$cl->getCidade()}','{$cl->getEstado()}')";
        //echo $sql;
        return mysqli_query($this->conexao, $sql);
    }

}
