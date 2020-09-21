<?php

include '../DAO/DAOOperaciones.php';

session_start();

$codigo = $_REQUEST['codigo'];

$motivo = $_REQUEST['motivo'];
    
try{
    DAOOperaciones::eliminarEstanteria($codigo,$motivo);   

}catch (EstanteriasException $EE){
    $_SESSION['mensaje'] = $EE->getMessage();
    $_SESSION['codigo'] = $EE->getCode();
    $_SESSION['sitio'] = $EE->getSite();
    header ('Location: ../Vistas/VistaMenu.php?pagina=VistaErroresMenu');
    exit;
}
header ('Location: ../Vistas/VistaMenu.php?pagina=VistaMensaje');