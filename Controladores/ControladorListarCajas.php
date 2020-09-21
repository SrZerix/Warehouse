<?php

include_once '../DAO/DAOOperaciones.php';

include_once '../Modelos/CajasException.php';

session_start();

$option = $_REQUEST['option'];

if ($option == "Listar"){

try{
$ArrayCajas=DAOOperaciones::listarCajas();
$_SESSION['ArrayCajas']=$ArrayCajas;
}
catch(CajasException $CE){
    $_SESSION['mensaje'] = $CE->getMessage();
    $_SESSION['codigo'] = $CE->getCode();
    $_SESSION['sitio'] = $CE->getSite();
    header ('Location: ../Vistas/VistaMenu.php?pagina=VistaErroresMenu');
    exit;
}
header ('Location: ../Vistas/VistaMenu.php?pagina=VistaListarCajas');
}else if($option == "Vender"){
    
try{
$ArrayCajas=DAOOperaciones::listarCajas();
$_SESSION['ArrayCajas']=$ArrayCajas;
}
catch(CajasException $CE){
    $_SESSION['mensaje'] = $CE->getMessage();
    $_SESSION['codigo'] = $CE->getCode();
    $_SESSION['sitio'] = $CE->getSite();
    header ('Location: ../Vistas/VistaMenu.php?pagina=VistaErroresMenu');
    exit;
}
header ('Location: ../Vistas/VistaMenu.php?pagina=VistaBajaCaja&vender=Confirmar');
}else if($option == "DevolverAll"){
try{
$ArrayCajas=DAOOperaciones::listarCajasTodas();
$_SESSION['ArrayCajas']=$ArrayCajas;
}
catch(CajasException $CE){
    $_SESSION['mensaje'] = $CE->getMessage();
    $_SESSION['codigo'] = $CE->getCode();
    $_SESSION['sitio'] = $CE->getSite();
    header ('Location: ../Vistas/VistaMenu.php?pagina=VistaErroresMenu');
    exit;
}
header ('Location: ../Vistas/VistaMenu.php?pagina=VistaBajaCaja&vender=Confirmar2');
}