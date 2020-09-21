<?php

include '../DAO/DAOOperaciones.php';

include '../Modelos/LoginException.php';

$user=$_REQUEST['user'];
$pass=$_REQUEST['pass'];

session_start();
try{
$root = DAOOperaciones::login($user,$pass);
header('Location: ../Vistas/VistaMenu.php');
}catch(LoginException $LE){
    $_SESSION['mensaje'] = $LE->getMessage();
    $_SESSION['codigo'] = $LE->getCode();
    $_SESSION['sitio'] = $LE->getSite();
    header('Location: ../Vistas/VistaErrores.php');
    exit;
}
    
