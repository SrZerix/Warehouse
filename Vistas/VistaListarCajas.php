
            <section id="loginD" class="d-flex justify-content-center container">
                <table id="tablaList" class="rounded">
                 <thead><tr><td class="p-3 rounded-top" colspan="8"><h3 class="d-flex justify-content-center"> Cajas Disponibles </h3></td></tr></thead>
                 <tbody>
                     <tr id="primeraRow">
                         <th class="p-2 text-center">Codigo</th>
                         <th class="p-2 text-center"> Material </th>
                         <th class="p-2 text-center"> Contenido </th>
                         <th class="p-2 text-center"> Color </th>
                         <th class="p-2 text-center"> Alto </th>
                         <th class="p-2 text-center"> Ancho </th>
                         <th class="p-2 text-center"> Profundidad </th>
                         <th class="p-2 text-center"> Fecha Alta </th>
                     </tr>
                     
                     <?php
                     $ArrayCajas=$_SESSION['ArrayCajas'];
                     
                    
                     foreach($ArrayCajas as $data) {
                         
                      ?>
                                   
                     <tr class="border">
                      <td class="border text-center"> <?php  echo $data->getCodigo(); ?> </td>
                      <td class="border text-center"> <?php   echo $data->getMaterial(); ?> </td>
                      <td class="border text-center"> <?php   echo $data->getContenido(); ?> </td>
                      <td class="border text-center" style="background-color:<?php  echo $data->getColor(); ?>">  </td>
                      <td class="border text-center">  <?php  echo $data->getAlto(); ?> </td>
                      <td class="border text-center">  <?php  echo $data->getAncho(); ?> </td>
                      <td class="border text-center">  <?php  echo $data->getProfundidad(); ?> </td>
                       <td class="border text-center">  <?php  echo  date("d-m-Y",strtotime($data->getFecha_alta()));?> </td>
                     </tr> <?php
                     } ?>                 
                 </tbody>   
                </table>
            </section>            