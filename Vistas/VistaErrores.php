<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Almacen Crystal - Login</title>
         <link rel="stylesheet" href="../Assets/main.css">
         <link rel="stylesheet" href="../Assets/Bootstrap/bootstrap.css">
         <link rel="stylesheet" href="../Assets/Fontawesome/all.min.css">
         <script src="../Assets/Bootstrap/bootstrap.bundle.min.js"></script>
    </head>
    <body id="cuerpo">
        <header class="container-fluid">
            <div class="row d-flex justify-content-around rounded-bootom">
                    <img src="../Assets/Imagenes/icono.png" alt="logo" width="120" height="80">
                    <span class="infoLogin mt-4 pr-3"> <h3> <?php echo $_SESSION['array']['empresa']; ?> -
                    <?php echo $_SESSION['array']['nombre']; ?> </h3> </span>
                    <span class="infoLogin pt-4 pr-3"> <h4> <?php echo $_SESSION['array']['direccion']; ?> -
                     <?php echo $_SESSION['array']['localidad']; ?> </h4> </span>
            </div>
        </header>
            <section id="login" class="d-flex justify-content-center container mb-5">
                <div id="rowLogin"class="row">
                    <div class="col-12 d-flex justify-content-center bg-danger rounded-top p-2">
                        <hgroup> <h3> Ha habido un error </h3> </hgroup>
                    </div>
                    <div class="col-12 p-2" id="errorMensaje">
                    <p>El código de error es: <?php echo $_SESSION['codigo'] ?></p>
                    <p>El error ha sido: <?php echo $_SESSION['mensaje'] ?></p>
                    <p>El error ha ocurrido en: <?php echo $_SESSION['sitio'] ?></p>
                    <a href="../Vistas/VistaLogin.php"> Volver atrás... </a>
                    </div>
                </div>          
            </section>                 
        <footer>
            
        </footer>
    </body>
</html>
