<?php

include_once '../DAO/DAOOperaciones.php';

session_start();
try{
    $array = DAOOperaciones::infoLogin();
}catch(InfoException $IE){
    $_SESSION['mensaje'] = $IE->getMessage();
    $_SESSION['codigo'] = $IE->getCode();
    $_SESSION['sitio'] = $IE->getSite();
header('Location: ../Vistas/VistaErrores.php');
}
$_SESSION['array'] = $array;
header('Location: ../Vistas/VistaLogin.php');
