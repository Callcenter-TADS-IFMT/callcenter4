<?php


class Tramite {

  private $id;
  private $hora_ini;
  private $hora_fin;
  private $tramite;
  private $solucao;
  private $id_chamado;
  private $data;
    
  
  function getData() {
      return $this->data;
  }

  function setData($data) {
      $this->data = $data;
  }

    
  
  function getId() {
      return $this->id;
  }

  function getHora_ini() {
      return $this->hora_ini;
  }

  function getHora_fin() {
      return $this->hora_fin;
  }

  function getTramite() {
      return $this->tramite;
  }

  function getSolucao() {
      return $this->solucao;
  }

  function getId_chamado() {
      return $this->id_chamado;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setHora_ini($hora_ini) {
      $this->hora_ini = $hora_ini;
  }

  function setHora_fin($hora_fin) {
      $this->hora_fin = $hora_fin;
  }

  function setTramite($tramite) {
      $this->tramite = $tramite;
  }

  function setSolucao($solucao) {
      $this->solucao = $solucao;
  }

  function setId_chamado($id_chamado) {
      $this->id_chamado = $id_chamado;
  }

    
}
