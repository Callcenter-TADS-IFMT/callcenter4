<?php include_once('cabecalho.php'); ?>

<div class="row">
    <div class="col-md-3 col-xs-12 col-lg-3">
        <?php include_once('sidebar.php'); ?>
    </div>

    <div class="col-md-9 col-xs-12 col-lg-9">
    </div>
    <br/>
    <?php
    $_SESSION['tipo'];
    $_SESSION['nome'];
    
  
    $usuario=$_SESSION['nome'];
    $tipo=$_SESSION['tipo'];
    
   
   // echo $usuario;
    //echo $tipo;
    
    
    ?>
    
    <h1>Bem vindo <?=$usuario?>!</h1>
    




<?php include_once('rodape.php'); ?>