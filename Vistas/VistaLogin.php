<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Almacen AlziJos - Login</title>
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
                    <div class="col-12 d-flex p-2 justify-content-center rounded-top" id="loginHead">
                        <hgroup>
                            <h4> Iniciar Sesión </h4>
                        </hgroup>
                    </div>
                    <div class="col-12 d-flex p-3 justify-content-around loginBody">
                        <form action="../Controladores/ControladorLogin.php">
                            <input id="inputUser" type="text" maxlenght="4" placeholder="Usuario" required class="mr-3" name="user" value="">
                            <input id="inputPass" type="password" maxlenght="15" placeholder="Contraseña" required name="pass" value="">
                    </div>    
                    <div class="col-12 d-flex p-2 justify-content-center loginBody rounded-bottom">
                            <button id="inputBoton" class="rounded mb-2">Acceder</button>
                    </div>
                        </form>
                </div>          
            </section>                 
        <footer>
            
        </footer>
    </body>
</html>
