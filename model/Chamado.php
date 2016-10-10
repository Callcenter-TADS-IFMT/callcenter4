<?php

class Chamado {

    private $id;
    private $relato;
    private $dt_abertura;
    private $cliente;
    private $atendente;
    private $elemento;
    private $status;
    
    function getStatus() {
        return $this->status;
    }

    function setStatus($status) {
        $this->status = $status;
    }

        
    function getCliente() {
        return $this->cliente;
    }

    function getAtendente() {
        return $this->atendente;
    }

    function getElemento() {
        return $this->elemento;
    }

    function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    function setAtendente($atendente) {
        $this->atendente = $atendente;
    }

    function setElemento($elemento) {
        $this->elemento = $elemento;
    }

        

    function getDt_abertura() {
        return $this->dt_abertura;
    }

    function setDt_abertura($dt_abertura) {
        $this->dt_abertura = $dt_abertura;
    }

    function getId() {
        return $this->id;
    }

    function getRelato() {
        return $this->relato;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setRelato($relato) {
        $this->relato = $relato;
    }

}
