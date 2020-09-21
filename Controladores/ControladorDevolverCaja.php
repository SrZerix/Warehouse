<?php

include '../DAO/DAOOperaciones.php';
include_once '../Modelos/Cajas.php';
include_once '../Modelos/CajaBackup.php';
include '../Modelos/CajaBackupException.php';
  

session_start();

$codigo = $_REQUEST['codigo'];

$pagina = $_REQUEST['PaginaDevolucion'];


if ($pagina == "Busqueda"){

try{
    $caja = DAOOperaciones::buscarCaja($codigo);
    $ArrayEstanterias=DAOOperaciones::listarEstanterias();
    $_SESSION['ArrayEstan']=$ArrayEstanterias;
    $_SESSION['cajaNueva']=$caja;
}catch(CajasBackupException $CB){
    $_SESSION['mensaje'] = $CB->getMessage();
    $_SESSION['codigo'] = $CB->getCode();
    $_SESSION['sitio'] = $CB->getSite();
    header ('Location: ../Vistas/VistaMenu.php?pagina=VistaErroresMenu');
    exit;
}
header ('Location: ../Vistas/VistaMenu.php?pagina=VistaBajaCaja&vender=Elegir');
}

if ($pagina == "Insertar"){
    
    $cajaNueva = $_SESSION['cajaNueva'];
    $estanteria=$_REQUEST['estanteria'];
    $leja=$_REQUEST['leja'];

try{
    DAOOperaciones::triggerDevolucion($leja,$estanteria,$cajaNueva->getCodigo());
    $caja = new Cajas($cajaNueva->getCodigo(),$cajaNueva->getMaterial(),$cajaNueva->getContenido(),$cajaNueva->getColor(), $cajaNueva->getAlto(),$cajaNueva->getAncho(),$cajaNueva->getProfundidad(),$cajaNueva->getFecha_alta());
    DAOOperaciones::insertarCajaSolo($caja);
}catch(CajasException $CE){
    $_SESSION['mensaje'] = $CE->getMessage();
    $_SESSION['codigo'] = $CE->getCode();
    $_SESSION['sitio'] = $CE->getSite();
    header ('Location: ../Vistas/VistaMenu.php?pagina=VistaErroresMenu');
    exit;
}
header ('Location: ../Vistas/VistaMenu.php?pagina=VistaMensaje');
}