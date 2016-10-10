<?php

class Cliente {
    
    private $id;
    private $nome;
    private $telefone;
    private $telefone2;
    private $pessoa;
    private $email;
    private $contato;
    private $endereco;
    private $cidade;
    private $estado;
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getTelefone() {
        return $this->telefone;
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

    function getTelefone2() {
        return $this->telefone2;
    }

    function getPessoa() {
        return $this->pessoa;
    }

    function getEmail() {
        return $this->email;
    }

    function getContato() {
        return $this->contato;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getEstado() {
        return $this->estado;
    }

    function setTelefone2($telefone2) {
        $this->telefone2 = $telefone2;
    }

    function setPessoa($pessoa) {
        $this->pessoa = $pessoa;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setContato($contato) {
        $this->contato = $contato;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

}
