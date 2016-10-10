<?php

function listaAtendente($conexao){
    $atendentes= Array();
    $sql = "select * from atendente where tipo = 'atendente'";
    $dados = mysqli_query($conexao, $sql);
    
    while ($atendente = mysqli_fetch_assoc($dados)){
        array_push($atendentes, $atendente);
    }
    return $atendentes;
}



