<?php

include '../DAO/DAOOperaciones.php';
include_once '../Modelos/CajaBackup.php';
include '../Modelos/CajaBackupException.php';

session_start();
$controlador=$_REQUEST['controlador'];

if ($controlador == "Confirmar"){
   $codigo = $_REQUEST['codigo'];
try {
    DAOOperaciones::cajasExiste($codigo);
}catch(CajasException $CA){
    $_SESSION['mensaje'] = $CA->getMessage();
    $_SESSION['codigo'] = $CA->getCode();
    $_SESSION['sitio'] = $CA->getSite();
    header ('Location: ../Vistas/VistaMenu.php?pagina=VistaErroresMenu');
    exit();
}
$fecha=date("d-m-Y");
try{
$ArrayPrueba = DAOOperaciones::comprobarCodigoCaja($codigo);
$CajaBackup = new CajaBackup($ArrayPrueba['codigo'],$ArrayPrueba['material'],$ArrayPrueba['contenido'],$ArrayPrueba['color'],$ArrayPrueba['alto'],$ArrayPrueba['ancho'],$ArrayPrueba['profundidad'],$ArrayPrueba['fecha_alta'],$ArrayPrueba['id_estanterias'],$ArrayPrueba['n_leja'],$fecha);
$ArrayBackups["Caja"] = $CajaBackup;
$ArrayBackups["CodigoEstan"] = $ArrayPrueba['codigoEstan'];
$_SESSION["idOldCaja"] = $ArrayPrueba['id'];
}catch(CajasBackupException $CBE){
    $_SESSION['mensaje'] = $CBE->getMessage();
    $_SESSION['codigo'] = $CBE->getCode();
    $_SESSION['sitio'] = $CBE->getSite();
    header ('Location: ../Vistas/VistaMenu.php?pagina=VistaErroresMenu');
    exit();
}
$_SESSION['ArrayTodoBackup']=$ArrayBackups;
header ("Location: ../Vistas/VistaMenu.php?pagina=VistaBajaCaja&vender=Backup&devolucion=False");

    }else if($controlador == "Backup"){
    $ArrayBackup = $_SESSION['ArrayTodoBackup']['Caja'];
    $idOldCaja = $_SESSION['idOldCaja'];
    try{
    DAOOperaciones::deleteCaja($idOldCaja);
    }catch(CajasBackupException $CBE){
        $_SESSION['mensaje'] = $CBE->getMessage();
        $_SESSION['codigo'] = $CBE->getCode();
        $_SESSION['sitio'] = $CBE->getSite();
        header ('Location: ../Vistas/VistaMenu.php?pagina=VistaErroresMenu');
        exit();
    }
    header ("Location: ../Vistas/VistaMenu.php?pagina=VistaMensaje");
 
   }else if($controlador == "Devolucion"){
    $ArrayCajaNueva = $_SESSION['ArrayTodoBackup']['Caja'];
    $idOldCaja = $_SESSION['idOldCaja'];
    try{
    DAOOperaciones::deleteCaja($idOldCaja);
    }catch(CajasBackupException $CBE){
        $_SESSION['mensaje'] = $CBE->getMessage();
        $_SESSION['codigo'] = $CBE->getCode();
        $_SESSION['sitio'] = $CBE->getSite();
        header ('Location: ../Vistas/VistaMenu.php?pagina=VistaErroresMenu');
        exit();
    }
    header ("Location: ../Vistas/VistaMenu.php?pagina=VistaMensaje");
    }