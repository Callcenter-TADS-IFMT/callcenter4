<?php

function listaElemento($conexao){
    $elementos = Array();
    $sql = "SELECT * FROM atendente WHERE tipo = 'suporte'";
    $dados = mysqli_query($conexao, $sql);
    
    while ($elemento = mysqli_fetch_assoc($dados)){
        array_push($elementos, $elemento);
    }
    return $elementos;
}



