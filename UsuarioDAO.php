<?php

//essa classe elimina a necessidade do arquivo ProdutosDb.php

class UsuarioDAO {

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

    function listaUsuarios($query) { // removi o parametro con de dentro do parametroes
        $this->conexao;
        $usuarios = Array();
        $sql = $query;
       // echo $sql;
        $resultado = mysqli_query($this->conexao, $sql);
        while ($usuario = mysqli_fetch_assoc($resultado)) {

            $us = new Usuario();

            $us->setId($usuario['id']);
            $us->setNome($usuario['nome']);
            $us->setTelefone($usuario['telefone']);
            $us->setTipo($usuario['tipo']);
            $us->setLogin($usuario['login']);
            $us->setSenha($usuario['senha']);
            $us->setAtivo($usuario['ativo']);
            array_push($usuarios, $us);
        }
        return $usuarios;
    }

    function insereUsuario(Usuario $at) {
        $sql = "INSERT INTO atendente (nome,telefone,tipo,login,senha,ativo) VALUES ('{$at->getNom()}','{$at->getTelefone()}','{$at->getTipo()}','{$at->getLogin()}','{$at->getSenha()}',{$at->getAtivo()})";
        //echo $sql;
        return mysqli_query($this->conexao, $sql);
    }

}
