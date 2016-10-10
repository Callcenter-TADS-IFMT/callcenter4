<?php

// nao precisa mais dele por causa do DAO


function listaChamados() { // removi o parametro con de dentro do parametroes
    $this->conexao;
    $produtos = Array();
    $sql = "SELECT 
                ch.id AS nro_chamado, 
                cl.id as id_cliente,
                cl.nome AS cliente, 
                el.id AS id_elemento,
                el.nome AS responsavel, 
                status, 
                dt_abertura
                FROM chamado ch
                INNER JOIN cliente cl ON cl.id = ch.id_cliente
                LEFT JOIN elemento el ON el.id = ch.id_elemento";

    $resultado = mysqli_query($this->conexao, $sql);
    while ($chamado = mysqli_fetch_assoc($resultado)) {

        $ch = new Chamado();
        $el = new Elemento();
        $cl = new Cliente();
        $ch->setId($chamado['nro_chamado']);
        $ch->setDt_abertura($chamado['dt_abetura']);
        $el->setId($chamado['id_elemento']);
        $el->setNome($chamado['responsavel']);
        $cl->setId($chamado['id_cliente']);
        $el->setNome($chamado['cliente']);
        $ch->setCliente($cl);
        $ch->setElemento($el);
        array_push($produtos, $ch);
    }
    return $chamados;
}

function insereProduto($con, Produto $p) {
    $sql = "insert into produto (nome,preco,descricao,categoria,usado) values ('{$p->getNome()}','{$p->getPreco()}','{$p->getDescricao()}',{$p->getCategoria()->getId()},{$p->getUsado()})";
    echo $sql;
    return mysqli_query($con, $sql);
}

function removeProduto($con, Produto $p) {
    $sql = "delete from produto where id = {$p->getId()}";
    return mysqli_query($con, $sql);
}
