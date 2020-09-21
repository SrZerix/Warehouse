
    <body id="cuerpo">
            <section id="loginD" class="d-flex justify-content-center container">
                <table id="tablaList" class="rounded">
                 <thead><tr><td class="p-3" colspan="7"><h3 class="d-flex justify-content-center"> Estanterías Disponibles </h3></td></tr></thead>
                 <tbody>
                     <tr id="primeraRow">
                         <th class="p-2 text-center">Nº Total Lejas</th>
                         <th class="p-2 text-center"> Nº Lejas Ocupadas </th>
                         <th class="p-2 text-center"> Código </th>
                         <th class="p-2 text-center"> Material </th>
                         <th class="p-2 text-center"> Pasillo </th>
                         <th class="p-2 text-center"> Posición </th>
                         <th class="p-2 text-center"> Fecha de Alta </th>
                     </tr>
                     
                     <?php
                     $ArrayEstanterias=$_SESSION['ArrayEstanterias'];
                     
                    
                     foreach($ArrayEstanterias as $data) {
                         
                      ?>
                                   
                     <tr class="border">
                      <td class="border text-center"> <?php  echo $data->getNLejas(); ?> </td>
                      <td class="border text-center"> <?php   echo $data->getNLejasOcupadas(); ?> </td>
                      <td class="border text-center"> <?php   echo $data->getCodigo(); ?> </td>
                      <td class="border text-center">  <?php  echo $data->getMaterial(); ?> </td>
                      <td class="border text-center">  <?php  echo $data->getPasillo(); ?> </td>
                      <td class="border text-center">  <?php  echo $data->getNposi(); ?> </td>
                      <td class="border text-center">  <?php  echo date("d-m-Y",strtotime($data->getFechaAlta()));?> </td>
                     </tr> <?php
                     } ?>                 
                 </tbody>   
                </table>
            </section>
