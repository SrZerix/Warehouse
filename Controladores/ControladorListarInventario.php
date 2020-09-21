<?php
include_once '../DAO/DAOOperaciones.php';

include_once '../Modelos/AlmacenException.php';

session_start();
try{
$ArrayInventario=DAOOperaciones::listarInventario();
$_SESSION['ArrayInventario']=$ArrayInventario;
}
catch(AlmacenException $CE){
    $_SESSION['mensaje'] = $CE->getMessage();
    $_SESSION['codigo'] = $CE->getCode();
    $_SESSION['sitio'] = $CE->getSite();
    header ('Location: ../Vistas/VistaMenu.php?pagina=VistaErroresMenu');
    exit;
}
header ('Location: ../Vistas/VistaMenu.php?pagina=VistaListarInventario');