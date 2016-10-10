<?php


class Usuario {

    private $id;
    private $nome;
    private $telefone;
    private $tipo;
    private $login;
    private $senha;
    private $ativo;
    
    function getIdUs() {
        return $this->id;
    }

    function getNom() {
        return $this->nome;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function getAtivo() {
        return $this->ativo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setAtivo($ativo) {
        $this->ativo = $ativo;
    }

   
}
