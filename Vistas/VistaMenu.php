<!DOCTYPE html>
<?php
include '../Modelos/Cajas.php';
include '../Modelos/Estanterias.php';
include '../Modelos/Pasillo.php';
include '../Modelos/CajaBackup.php';
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Almacen AlziJos - Menú</title>
         <link rel="stylesheet" href="../Assets/Bootstrap/bootstrap.css">
         <link rel="stylesheet" href="../Assets/Fontawesome/all.min.css">
         <link rel="stylesheet" href="../Assets/menu.css">
         <link rel="icon" type="image/png" href="../Assets/Imagenes/icono.png" sizes="30x10">
    </head>
    <body id="cuerpo">
        <header class="container-fluid">
            <div class="row d-flex justify-content-around rounded-bootom">
                <span class="infoLogin">
                    <img src="../Assets/Imagenes/icono.png" alt="logo" width="90" height="70">
                    <h4 class="pt-4"> <?php echo $_SESSION['array']['empresa']; ?> </h4> </span>                 
                <span class="pt-4"> <h4> <?php echo $_SESSION['array']['codigo']; ?> -
                    <?php echo $_SESSION['array']['nombre']; ?> </h4> </span>
                <span class="infoLogin pt-4 pr-3"> <h4> <?php echo $_SESSION['array']['direccion']; ?> -
                    <?php echo $_SESSION['array']['localidad']; ?> </h4> </span>
                <span class="pt-4"> <h4> <?php echo $_SESSION['array']['responsable']; ?> </h4> </span>
            </div>
        </header>
            <section id="login" class="container mb-5">
              <nav class="navbar navbar-expand-lg mt-4 rounded" id="nav">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                     <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Almacén
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                          <a class="dropdown-item" href="../Controladores/ControladorListarInventario.php">Listar Inventario</a>
                      </div>
                    </li>
                    </li>
                       <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Estanterias
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                          <a class="dropdown-item" href="../Controladores/ControladorInsertarEstanteria.php?pagina=Pasillo">Insertar Estantería</a>
                        <a class="dropdown-item" href="../Controladores/ControladorListarEstanterias.php?pagina=ListarOnly">Listar Estanterías</a>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="../Controladores/ControladorListarEstanterias.php?pagina=Listar">Retirar Estanterías</a>
                      </div>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cajas
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
                        <a class="dropdown-item" href="../Controladores/ControladorInsertarCaja.php?pagina=Buscar">Insertar Caja</a>
                        <a class="dropdown-item" href="../Controladores/ControladorListarCajas.php?option=Listar">Listar Cajas</a>
                         <div class="dropdown-divider"></div>
                         <a class="dropdown-item" href="../Controladores/ControladorListarCajas.php?option=Vender">Vender Caja</a>
                        <a class="dropdown-item" href="../Controladores/ControladorListarCajas.php?option=DevolverAll">Devolución de Caja</a>
                      </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link disabled" href="#">Otros</a>
                    </li>
                  </ul>
                </div>
              </nav>
            </section>
        
        <section class="container p-2 rounded">
            <?php if(isset($_GET['pagina'])){
             
              $file= './'.$_GET['pagina'].'.php';
             if(file_exists($file)){
               include($file);
             }
                  else 
            {echo "";}}
            else  {echo '';}
            ?>
        </section>
         <script src="../Assets/Bootstrap/jquery-3.3.1.slim.min.js"></script>
         <script src="../Assets/Bootstrap/popper.min.js"> </script>
         <script src="../Assets/Bootstrap/bootstrap.bundle.min.js"></script>
    </body>
</html>