<?php

//essa classe elimina a necessidade do arquivo ProdutosDb.php

class ChamadoDAO {

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

    function listaChamados($query) { // removi o parametro con de dentro do parametroes
        $this->conexao;
        $chamados = Array();
        $sql = $query;
        //echo $sql;
        $resultado = mysqli_query($this->conexao, $sql);
        while ($chamado = mysqli_fetch_assoc($resultado)) {

            $ch = new Chamado();
            $el = new Elemento();
            $cl = new Cliente();
            $ch->setId($chamado['nro_chamado']);
            $ch->setRelato($chamado['relato']);
            $ch->setDt_abertura($chamado['dt_abertura']);
            $ch->setStatus($chamado['status']);
            $el->setId($chamado['id_elemento']);
            $el->setNome($chamado['responsavel']);
            $cl->setId($chamado['id_cliente']);
            $cl->setNome($chamado['cliente']);
            $cl->setTelefone($chamado['telefone_cliente']);
            $ch->setCliente($cl);
            $ch->setElemento($el);
            array_push($chamados, $ch);
        }
        return $chamados;
    }

    function insereChamado(Chamado $ch) {
        $sql = "insert into chamado (id_atendente,id_cliente,relato,id_elemento,status,dt_abertura) values ({$ch->getAtendente()->getId()},{$ch->getCliente()->getId()},'{$ch->getRelato()}',{$ch->getElemento()->getId()},'A','{$ch->getDt_abertura()}')";
        //echo $sql;
        return mysqli_query($this->conexao, $sql);
    }

    function removeProduto(Produto $p) {
        $sql = "delete from produto where id = {$p->getId()}";
        return mysqli_query($this->conexao, $sql);
    }

    function assumeChamado($id) {
        $sql = "UPDATE chamado SET STATUS = 'E' WHERE id = {$id}";
        return mysqli_query($this->conexao, $sql);
    }
    
        function encerraChamado($id) {
        $sql = "UPDATE chamado SET STATUS = 'C' WHERE id = {$id}";
        return mysqli_query($this->conexao, $sql);
    }
      
    

}
