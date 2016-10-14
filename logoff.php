<?php

$_SESSION['logado']="false";

header('Location: login.php');
session_destroy();
?>