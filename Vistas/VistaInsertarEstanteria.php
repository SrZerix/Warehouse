            <section id="login" class="d-flex justify-content-center container mb-5">
                <div id="rowLogin"class="row d-flex justify-content-center mb-3">  
                    <form action="../Controladores/ControladorInsertarEstanteria.php">
                        <table class="table table-hove" id="tablaCajas" style="min-width:500px">
                            <thead><tr><td class="p-3 align-middle text-center" colspan="3"><h3 class="text-center"> Agregar una nueva estantería </h3></td></tr></thead>
                            <tbody>
                           <tr><td class="p-3">        
                                   <input class="form-control align-middle text-center" type="text" maxlength="5" placeholder="Código" pattern="[ES]+[0-9]{3}" title="Ha de estar compuesto por 'ES' más tres números." name="codigo" value="ES" required> 
                                    </td>
                            <td class="p-3">
                                <input class="form-control align-middle text-center" type="number" min="1" max="10" placeholder="Nº de Lejas" name="nLejas" value="" required> 
                                    </td>
                            <td class="p-3">
                            <?php $numero = (int)date('d'); $date = date('Y')."-".date('m')."-".$numero; ?>
                                <input class="form-control align-middle text-center" type="date" placeholder="Fecha" min="<?= $date; ?>" name="fecha" value="" required>
                                    </td></tr>
                           <tr> <td class="p-3">
                                       <label class="pl-4 align-middle text-center"> Pasillo <select class="form-control" required id="pasillo" name="pasillo" onchange="cargarHuecosLibres(this.value)">
                                         <?php
                                    $ArrayPasillo = $_SESSION['ArrayPasillo'];
                                    foreach($ArrayPasillo as $data){?>
                                    <option value="<?php echo $data->getId()?>"><?php echo $data->getLetra()?></option> <?php } ?>
                                        </select></label>
                                    </td>
                                <td class="p-3 align-middle text-center">
                                    <label> Posición <select class="form-control" required id="posicion" name="posicion">
                                    </td>
                            <td class="p-3 align-middle text-center">
                                <input class="form-control" type="text" maxlength="10" placeholder="Material" name="material" value="" required>  
                                    </td></tr>    
                         <tr><td class="p-3 text-center" colspan="3">
                                 <div class="d-flex justify-content-center"> <button class=" btn rounded">Agregar</button> </div>
                                    </td></tr>
                            </tbody>
                        </table>
                        <?php $_SESSION['InsertPagina']="Insert" ?>
                    </form>
                </div>          
            </section>
         <script src="../Assets/main.js"></script>
        <script>
           cargarHuecosLibres(document.getElementById('pasillo').value);
            </script>
