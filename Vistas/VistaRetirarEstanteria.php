<?php

$pagina = $_REQUEST['Retirar'];
    
$dataList = $_SESSION['ArrayEstanterias'];

if ($pagina == "Comprobar"){
?>

<section id="login" class="d-flex justify-content-center container mb-5">
            <div id="rowLogin"class="row d-flex justify-content-center mb-3">  
                <form action="../Controladores/ControladorRetirarEstanteria.php">
                    <table id="tablaInsEst">
                        <thead><tr><td class="p-3" colspan="3"><h3 class="d-flex justify-content-center">Retirar Estantería</h3></td></tr></thead>
                        <tbody>
                            <tr>
                                <td class="p-3 d-flex justify-content-center"><label> Código:
                                        
                                        <select id="codigoList" name="codigo">
                                           <?php foreach ($dataList as $data){ ?> 
                                            <?php if ($data->getNLejasOcupadas() == 0){ ?> 
                                            <option value="<?= $data->getCodigo(); ?>"> <?= $data->getCodigo(); ?> </option> 
                                        <?php } } ?>
                                        </select>
                                    </label>
                                </td>
                            </tr> 
                             <tr>
                                 <td class="p-3"> * SOLO se muestrán estanterías sin cajas.</td>
                             </tr>
                             <tr>
                                 <td class="p-3">Motivo: <input type="text" name="motivo" required maxlength="40" value=""></td>
                             </tr>
                                 <td class="p-3 d-flex justify-content-center"><label> <button type="submit">Comprobar</button></label></td>
                            </tr> 
                        </tbody>
                    </table>
                </form>
            </div>          
   </section>
<?php } ?>