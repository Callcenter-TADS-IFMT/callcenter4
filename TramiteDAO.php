<?php

//essa classe elimina a necessidade do arquivo ProdutosDb.php

class TramiteDAO {

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

    function listaTramites($query) { // removi o parametro con de dentro do parametroes
        $this->conexao;
        $tramites = Array();
        $sql = $query;
        $resultado = mysqli_query($this->conexao, $sql);
        while ($tramite = mysqli_fetch_assoc($resultado)) {

            
            $tr = new Tramite();
            
            $tr->setId($tramite['id']);
            $tr->setHora_ini($tramite['hora_ini']);
            $tr->setHora_fin($tramite['hora_fin']);
            $tr->setTramite($tramite['tramite']);
            $tr->setSolucao($tramite['solucao']);
            $tr->setId_chamado($tramite['id_chamado']);
            $tr->setData($tramite['data']);
                       
            array_push($tramites, $tr);
        }
        return $tramites;
    }

    function insereTramite(Tramite $tr) {
        $sql = "INSERT INTO tramite (hora_ini,hora_fin,tramite,solucao,id_chamado) VALUES ('{$tr->getHora_ini()}','{$tr->getHora_fin()}','{$tr->getTramite()}',{$tr->getSolucao()},{$tr->getId_chamado()})";
        return mysqli_query($this->conexao, $sql);
    }


    function atualizaTramite($id) {
        $sql = "UPDATE chamado SET STATUS = 'E' WHERE id = {$id}";
        return mysqli_query($this->conexao, $sql);
    }
    
      
    

}

