<?php
$vender = $_REQUEST['vender'];
    
$dataList = $_SESSION['ArrayCajas'];

if ($vender == 'Confirmar'){        
?>          
    <section id="login" class="d-flex justify-content-center container mb-5">
            <div id="rowLogin"class="row d-flex justify-content-center mb-3">  
                <form action="../Controladores/ControladorBajaCaja.php">
                    <table id="tablaInsEst">
                        <thead><tr><td class="p-3" colspan="3"><h3 class="d-flex justify-content-center">Venta / Cajas</h3></td></tr></thead>
                        <tbody>
                            <tr>
                                <td class="p-3 d-flex justify-content-center"><label> Código:
                                        <select id="codigoList" name="codigo">
                                           <?php foreach ($dataList as $data){ ?>
                                                
                                            <option value="<?= $data->getCodigo(); ?>"> <?= $data->getCodigo(); ?> </option> 
                                            
                                        <?php  } ?>
                                        </select>
                                    </label>
                                </td>
                            </tr> 
                             <tr>
                                 <td class="p-3 d-flex justify-content-center"><label> <button type="submit">Comprobar</button></label></td>
                            </tr> 
                        </tbody>
                    </table>
                    <input type="hidden" value="Confirmar" name="controlador">
                </form>
            </div>          
   </section>
<?php
}else if ($vender == "Confirmar2"){ ?>

        <section id="login" class="d-flex justify-content-center container mb-5">
            <div id="rowLogin"class="row d-flex justify-content-center mb-3">  
                <form action="../Controladores/ControladorDevolverCaja.php">
                    <table id="tablaInsEst">
                        <thead><tr><td class="p-3" colspan="3"><h3 class="d-flex justify-content-center">Devolución / Cajas</h3></td></tr></thead>
                        <tbody>
                            <tr>
                                <td class="p-3 d-flex justify-content-center"><label> Código: <!-- <input list="codigoList" autocomplete="off" name="codigo" type="type" maxlength="5"> -->
                                        <select id="codigoList" name="codigo">
                                           <?php foreach ($dataList as $data){ ?>
                                                
                                            <option value="<?= $data->getCodigo(); ?>"> <?= $data->getCodigo(); ?> </option> 
                                            
                                        <?php  } ?>
                                        </select>
                                    </label>
                                </td>
                            </tr> 
                             <tr>
                                 <td class="p-3 d-flex justify-content-center"><label> <button type="submit">Comprobar</button></label></td>
                            </tr> 
                        </tbody>
                    </table> 
                      <input type="hidden" value="Busqueda" name="PaginaDevolucion">
                </form>
            </div>          
   </section>
 <?php
}else if ($vender == 'Backup'){
?>            
    <section class="mb-5">                  
        <form action="../Controladores/ControladorBajaCaja.php">
            <?php $CajaBackup=$_SESSION['ArrayTodoBackup']['Caja']; $codigoEstan=$_SESSION['ArrayTodoBackup']['CodigoEstan'];?>
            <table class="table table-hover" id="tablaCajasConf">
                <thead>
                    <tr>
                        <td class="p-3" colspan="3"><h3 class="d-flex justify-content-center"> Confirme la caja </h3></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>                                
                        <td colspan="3" name="codigo" class="text-center"> <strong> Código: <?= $CajaBackup->getCodigo(); ?> </strong> </td>
                    </tr>
                    <tr>
                         <td name="alto">Alto: <?= $CajaBackup->getAlto(); ?></td>
                         <td name="ancho"> Ancho: <?= $CajaBackup->getAncho();  ?> </td>
                        <td name="profundidad"> Profundidad: <?= $CajaBackup->getProfundidad(); ?></td>
                    </tr>
                    <tr>
                         <td name="material"> Material: <?= $CajaBackup->getMaterial(); ?> </td>
                         <td name="contenido"> Contenido: <?= $CajaBackup->getContenido(); ?> </td>
                         <td name="color"><div class="text-center" style=" max-width:200px;padding:5px;background-color:<?= $CajaBackup->getColor();?>">&nbsp;&nbsp;</div></td>
                    </tr>
                    <tr>
                        <td name="esCodigo"colspan="2"> Código Estantería: <?= $codigoEstan; ?> </td>
                         <td> Leja: <?= $CajaBackup->getLeja(); ?> </td>
                    </tr>
                    <tr>
                         <td colspan="2"> Fecha Alta: <?= date("d-m-Y",strtotime($CajaBackup->getFecha_alta()));?> </td>
                         <td> Fecha Baja: <?= $CajaBackup->getFecha_salida(); ?> </td>
                    </tr>     
                     <tr>
                         <td colspan="3" class="text-center"> <button type="submit">Confirmar</button></td>
                    </tr> 
                </tbody>
            </table>
               <input type="hidden" value="Backup" name="controlador">
        </form>       
    </section>
<?php 
}else if($vender == 'Elegir'){ ?>
    <section class="mb-5">                  
        <form action="../Controladores/ControladorDevolverCaja.php" id="formularioUno" method="GET">
            <?php $cajaNueva=$_SESSION['cajaNueva'];?>
            <table class="table table-hover" id="tablaCajasConf">
                <thead>
                    <tr>
                        <td class="p-3" colspan="3"><h3 class="d-flex justify-content-center"> Confirme la caja </h3></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>                                
                        <td colspan="3" class="text-center"> <strong> Código: <?= $cajaNueva->getCodigo();?> </strong> </td>
                    </tr>
                    <tr>
                         <td>Alto: <?= $cajaNueva->getAlto(); ?></td>
                         <td> Ancho: <?= $cajaNueva->getAncho(); ?> </td>
                        <td> Profundidad: <?= $cajaNueva->getProfundidad(); ?></td>
                    </tr>
                    <tr>
                         <td> Material: <?= $cajaNueva->getMaterial(); ?> </td>
                         <td> Contenido: <?= $cajaNueva->getContenido(); ?> </td>
                         <td><div class="text-center" style=" max-width:200px;padding:5px;background-color:<?= $cajaNueva->getColor(); ?>">&nbsp;&nbsp;</div></td>
                    </tr>
                     <tr> <td class="p-3">
                             <form action="../Controladores/ControladorDevolverCaja.php" id="formularioDos" method="GET">
                                <label><span class="pr-3">Estantería</span>
                                    <select name="estanteria" id="estanteriasDisponibles" onchange="cargarLejasLibres(this.value)">
                                        <?php 
                                            $Array=$_SESSION['ArrayEstan']; 
                                        foreach($Array as $estanteria){?>  
                                        <option value="<?php echo $estanteria->getId();?>"> 
                                            Código--<?php    echo $estanteria->getCodigo(); ?>/
                                             Posición--<?php   echo $estanteria->getPasillo(); ?>
                                              <?php  echo $estanteria->getNPosi(); ?> </br> 
                                        </option>
                                     <?php   }  ?>
                                    </select>    
                            </td>
                            <td class="p-3" colspan="2">
                                <label><span class="pr-3">Lejas Disponibles</span>
                                    <select name="leja" id="lejasDisponibles">
                                       
                                    </select>    
                            </td>  </tr>
                             </form>
                    <tr>
                         <td colspan="2"> Fecha Alta: <?= date("d-m-Y"); ?> </td>
                         <td> Fecha Baja: <?= $cajaNueva->getFecha_salida(); ?> </td>
                    </tr>     
                     <tr>
                         <td colspan="3" class="text-center"> <button type="submit" id="boton">Confirmar</button></td>
                    </tr>  
                </tbody>
            </table>
            <input type="hidden" value="Insertar" name="controlador">
        </form>       
    </section>
       <script src="../Assets/main.js"></script>
        <script>
           cargarLejasLibres(document.getElementById('estanteriasDisponibles').value);
            </script>
<?php
}
?>
