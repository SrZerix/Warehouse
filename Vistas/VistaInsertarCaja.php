
    <body id="cuerpo">
            <section id="login" class="d-flex justify-content-center container mb-5 w-100">
                <div id="rowLogin"class="row d-flex justify-content-center mb-3 w-100">  
                    <form action="../Controladores/ControladorInsertarCaja.php" method="POST" class="w-50">
                        <table class="table table-hover" id="tablaCajas"> <!--id="tablaInsEst" -->
                            <thead><tr><td class="p-3" colspan="3"><h3 class="d-flex justify-content-center"> Agregar una nueva caja </h3></td></tr></thead>
                            <tbody>
                                <tr class="text-center"><td class="p-3" colspan="3">        
                                        <input class="form-control" style="max-width: 50%; margin-left: 125px;" type="text" maxlength="5" title="Ha de estar compuesto por 'CA' más tres números." pattern="[CA]+[0-9]{3}" placeholder="Código" name="codigo" value="CA" required> 
                                    </td>
                           </tr>
                            <td class="p-3 text-center">
                                <input class="form-control" type="text" maxlength="10" placeholder="Contenido" name="contenido" value="" required> 
                                    </td>
                            <td class="p-3 text-center">
                                    <input class="form-control" type="color" name="color" value="" required>
                                    </td>
                                <td class="p-3 text-center">
                                    <input class="form-control" type="text" maxlength="10" placeholder="Material" name="material" value="" required> 
                                    </td>  
                            </tr>
                           <tr> <td class="p-3 text-center">
                                <input class="form-control" type="number" min="1" max="20" placeholder="Ancho" name="ancho" value="" required> 
                                    </td>
                                    <td class="p-3 text-center"> 
                                  <input class="form-control" type="number" min="1" max="20" placeholder="Profundidad" name="profundidad" value="" required> 
                                 </td>
                                 <td class="p-3 text-center"> 
                                  <input class="form-control" type="number" min="1" max="20" placeholder="Alto" name="alto" value="" required> 
                                    </td>
                             </tr>   
                           <tr> 
                         <td class="p-3 text-center" >
                             <?php $numero = (int)date('d'); $date = date('Y')."-".date('m')."-".$numero; ?>
                             <label class="d-flex justify-content-center"><input class="form-control" type="date" placeholder="Fecha" name="fecha"  min="<?= $date; ?>" value="" required>  </label>
                                    </td> 
                            <td class="p-3 text-center align-middle">
                                <select name="estanteria" id="estanteriasDisponibles" class="form-control" onchange="cargarLejasLibres(this.value)">
                                        <?php 
                                            $Array=$_SESSION['ArrayEstan']; 
                                        foreach($Array as $estanteria){?>  
                                        <option value="<?php echo $estanteria->getId();?>"> 
                                            <?php echo $estanteria->getCodigo();?> | 
                                             <?php echo $estanteria->getPasillo();?> -
                                              <?php echo $estanteria->getNPosi();?> 
                                        </option>
                                     <?php   }  ?>
                                    </select>    
                            </td>
                            <td class="p-3 text-center align-middle">
                                <select name="leja" class="form-control text-center" id="lejasDisponibles">
                                       
                                </select>
                                
                            </td>
                            </tr>
                            <tr>
                            <td class="p-3 text-center" colspan="3">
                                <div class="d-flex justify-content-center"> <button class="btn rounded">Agregar</button> </div> 
                            </td>  </tr>
                                </tbody>
                        </table>
                        <input name="pagina" type="hidden" value="Insert">
                    </form>
                </div>          
            </section>
        <script src="../Assets/main.js"></script>
        <script>
           cargarLejasLibres(document.getElementById('estanteriasDisponibles').value);
            </script>

