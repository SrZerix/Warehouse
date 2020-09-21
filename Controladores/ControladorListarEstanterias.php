<?php

include_once '../DAO/DAOOperaciones.php';

include_once '../Modelos/EstanteriasException.php';

$pagina = $_REQUEST['pagina'];
session_start();

if ($pagina == "ListarOnly"){

try{
$ArrayEstanterias=DAOOperaciones::listarEstanterias();
$_SESSION['ArrayEstanterias']=$ArrayEstanterias;
}
catch(EstanteriasException $EE){
    $_SESSION['mensaje'] = $EE->getMessage();
    $_SESSION['codigo'] = $EE->getCode();
    $_SESSION['sitio'] = $EE->getSite();
    header ('Location: ../Vistas/VistaMenu.php?pagina=VistaErroresMenu');
    exit;
}
header ('Location: ../Vistas/VistaMenu.php?pagina=VistaListarEstanterias');

}else if ($pagina == "Listar"){
    
try{
    $ArrayEstanterias=DAOOperaciones::listarEstanterias();
    $_SESSION['ArrayEstanterias']=$ArrayEstanterias;
}
catch(EstanteriasException $EE){
    $_SESSION['mensaje'] = $EE->getMessage();
    $_SESSION['codigo'] = $EE->getCode();
    $_SESSION['sitio'] = $EE->getSite();
    header ('Location: ../Vistas/VistaMenu.php?pagina=VistaErroresMenu');
    exit;
}
header ('Location: ../Vistas/VistaMenu.php?pagina=VistaRetirarEstanteria&Retirar=Comprobar');
}