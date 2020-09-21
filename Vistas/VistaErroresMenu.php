
    <body id="cuerpo">
            <section id="login" class="d-flex justify-content-center container mb-5">
                <div id="rowLogin"class="row">
                    <div class="col-12 d-flex justify-content-center bg-danger rounded-top p-2">
                        <hgroup> <h3> Ha habido un error </h3> </hgroup>
                    </div>
                    <div class="col-12 p-2" id="errorMensaje">
                    <p>El código de error es: <?php echo $_SESSION['codigo'] ?></p>
                    <p>El error ha sido: <?php echo $_SESSION['mensaje'] ?></p>
                    <p>El error ha ocurrido en: <?php echo $_SESSION['sitio'] ?></p>
                    </div>
                </div>          
            </section>                 
