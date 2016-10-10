<?php

function listaCliente($conexao){
    $clientes = Array();
    $sql = "select * from cliente";
    $dados = mysqli_query($conexao, $sql);
    
    while ($cliente = mysqli_fetch_assoc($dados)){
        array_push($clientes, $cliente);
    }
    return $clientes;
}



