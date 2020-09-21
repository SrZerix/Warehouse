
            <section id="loginD" class="d-flex justify-content-center container">
                <table id="tablaList" style="min-width: 1200px" class="rounded">
                    <thead><tr><td class="p-3" colspan="7"><h3 class="d-flex justify-content-around"> Listado del Inventario </h3></td><td>
                        <strong><?php 
                        echo $fecha = date("d-m-Y");?></strong></td></tr></thead>
                 <tbody>
                     <tr id="primeraRow">
                         <th class="p-2 text-center">Estanterías: Lejas Totales </th>
                         <th class="p-2 text-center"> Lejas Ocupadas </th>
                         <th class="p-2 text-center"> Código </th>
                         <th class="p-2 text-center"> Material </th>
                         <th class="p-2 text-center"> Pasillo </th>
                         <th class="p-2 text-center"> Posición </th>
                         <th class="p-2 text-center" colspan="2"> Fecha de Alta </th>
                     </tr>
                     <?php
                     $ArrayInventario=$_SESSION['ArrayInventario'];
                     $estanteriaMostrada = [];
                     foreach($ArrayInventario as $data) {
                          
                         if(!in_array($data->esID, $estanteriaMostrada)){
                             $estanteriaMostrada[] = $data->esID;
                            ?>  
                     <tr id="segundaRow">
                      <td class=" text-center"> <?php  echo $data->esLejas; ?> </td>
                      <td class=" text-center"> <?php   echo $data->esLejasOcupadas; ?> </td>
                      <td class=" text-center"> <?php   echo $data->esCodigo; ?> </td>
                      <td class=" text-center">  <?php  echo $data->esMaterial; ?> </td>
                      <td class=" text-center">  <?php  echo $data->esPasillo; ?> </td>
                      <td class=" text-center">  <?php  echo $data->esPosi; ?> </td>
                      <td class=" text-center" colspan="2">  <?php  echo date("d-m-Y",strtotime($data->esFechaAlta));?> </td>
                     </tr> 
                            <?php
                         }
                      ?>          
                         
                     <tr>
                         <td colspan="17">
                      <?php  if ($data->caID==null){continue;}else{ ?>
                            <table id="tablaCajas" width="100%">
                            <tbody>
                                <tr>
                                 <th class="p-2 text-center"> Caja </th>
                                 <th class="p-2 text-center"> Código </th>
                                 <td> <?php  echo $data->caCodigo; ?> </td>
                                 <th class="p-2 text-center"> Material </th>
                                 <td> <?php   echo $data->caMaterial; ?> </td>
                                 <th class="p-2 text-center"> Contenido </th>
                                 <td> <?php   echo $data->caContenido; ?> </td>
                                 <th class="p-2 text-center"> Color </th>
                                 <td width="40px" style="background-color: <?php  echo $data->caColor; ?>">   </td>
                                 <th class="p-2 text-center"> Alto </th>
                                 <td>  <?php  echo $data->caAlto; ?> </td>
                                 <th class="p-2 text-center"> Ancho </th>
                                 <td>  <?php  echo $data->caAncho; ?> </td>
                                  <th class="p-2 text-center"> Leja </th>
                                 <td>  <?php  echo $data->caLeja; ?> </td>
                                 <th class="p-2 text-center"> Profundidad </th>
                                 <td>  <?php  echo $data->caProfundidad; ?> </td>
                                 <th class="p-2 text-center"> Fecha de Alta </th>
                                 <td>  <?php  echo date("d-m-Y",strtotime($data->caFechaAlta));?> </td>
                                </tr>                 
                            </tbody>   
                           </table>
                         </td>
                     </tr>
                         <?php
                     }} ?>                 
                 </tbody>   
                </table>
            </section>
