<?php

include_once '../DAO/DAOOperaciones.php';

include_once '../Modelos/EstanteriasException.php';
include_once '../Modelos/PasilloException.php';

session_start();
if (isset($_REQUEST['pagina'])){
$pagina = $_REQUEST['pagina'];}
else{
$pagina = $_SESSION['InsertPagina'];
}

if($pagina == "Pasillo"){
try{
$ArrayPasillo=DAOOperaciones::buscarPasillo();
$_SESSION['ArrayPasillo']=$ArrayPasillo;
}
catch(PasilloException $EE){
    $_SESSION['mensaje'] = $EE->getMessage();
    $_SESSION['codigo'] = $EE->getCode();
    $_SESSION['sitio'] = $EE->getSite();
    header ('Location: ../Vistas/VistaMenu.php?pagina=VistaErroresMenu');
    exit;
}
header ('Location: ../Vistas/VistaMenu.php?pagina=VistaInsertarEstanteria');
}else if($pagina == "Insert"){
$nLejas=$_REQUEST['nLejas'];
$nPosi=$_REQUEST['posicion'];
$codigo=$_REQUEST['codigo'];
$pasillo=$_REQUEST['pasillo'];
$material=$_REQUEST['material'];
$fecha=$_REQUEST['fecha'];

$estanteria = new Estanterias($nLejas, $nPosi, $codigo, $material, $pasillo, 0, $fecha);

try{
DAOOperaciones::insertarEstanteria($estanteria);
}
catch(EstanteriasException $EE){
    $_SESSION['mensaje'] = $EE->getMessage();
    $_SESSION['codigo'] = $EE->getCode();
    $_SESSION['sitio'] = $EE->getSite();
    header ('Location: ../Vistas/VistaMenu.php?pagina=VistaErroresMenu');
    exit;
}
catch(PasilloException $EE){
    $_SESSION['mensaje'] = $EE->getMessage();
    $_SESSION['codigo'] = $EE->getCode();
    $_SESSION['sitio'] = $EE->getSite();
    header ('Location: ../Vistas/VistaMenu.php?pagina=VistaErroresMenu');
    exit();
}
header ('Location: ../Vistas/VistaMenu.php?pagina=VistaMensaje');
}