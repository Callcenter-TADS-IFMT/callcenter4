<?php

//$_SESSION['tipo'] = null;
//$_SESSION['nome'] = null;
session_destroy();
header('Location: login.php');
?>