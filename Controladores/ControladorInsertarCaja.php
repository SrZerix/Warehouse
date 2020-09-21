<?php

include_once '../DAO/DAOOperaciones.php';

include_once '../Modelos/CajasException.php';

include_once '../Modelos/Cajas.php';

include_once '../Modelos/EstanteriasException.php';

session_start();
if(isset($_REQUEST['pagina'])){
    $pagina = $_REQUEST['pagina'];
}
    if ($pagina == "Buscar"){

    try{
    $ArrayEstanterias=DAOOperaciones::listarEstanterias();
    $_SESSION['ArrayEstan']=$ArrayEstanterias;
    }
    catch(EstanteriasException $EE){
        $_SESSION['mensaje'] = $EE->getMessage();
        $_SESSION['codigo'] = $EE->getCode();
        $_SESSION['sitio'] = $EE->getSite();
        header ('Location: ../Vistas/VistaMenu.php?pagina=VistaErroresMenu');
        exit;
    }
    header ('Location: ../Vistas/VistaMenu.php?pagina=VistaInsertarCaja');
}else if($pagina == "Insert"){
    
    $codigo=$_REQUEST['codigo'];
    $contenido=$_REQUEST['contenido'];
    $color=$_REQUEST['color'];
    $ancho=$_REQUEST['ancho'];
    $alto=$_REQUEST['alto'];
    $profundida=$_REQUEST['profundidad'];
    $material=$_REQUEST['material'];
    $fecha=$_REQUEST['fecha'];
    $estanteria=$_REQUEST['estanteria'];
    $leja=$_REQUEST['leja'];

    $caja = new Cajas($codigo, $material, $contenido, $color, $alto, $ancho, $profundida, $fecha);

    try{
    $ArrayCajas = DAOOperaciones::listarCajasBackup();
    if($ArrayCajas != false){
        foreach ($ArrayCajas as $data){
            if ($data->getCodigo() == $codigo){
               throw new CajasException("Ya existe una Caja Backup con ese código.",003,"listarCajasBackup()");
            }
          }
        }
    DAOOperaciones::insertarCaja($caja,$leja,$estanteria);
    }
    catch(CajasException $CE){
        $_SESSION['mensaje'] = $CE->getMessage();
        $_SESSION['codigo'] = $CE->getCode();
        $_SESSION['sitio'] = $CE->getSite();
        header ('Location: ../Vistas/VistaMenu.php?pagina=VistaErroresMenu');
        exit;
    }
    catch(EstanteriasException $EE){
        $_SESSION['mensaje'] = $EE->getMessage();
        $_SESSION['codigo'] = $EE->getCode();
        $_SESSION['sitio'] = $EE->getSite();
        header ('Location: ../Vistas/VistaMenu.php?pagina=VistaErroresMenu');
        exit;
    }
    header ('Location: ../Vistas/VistaMenu.php?pagina=VistaMensaje');
}