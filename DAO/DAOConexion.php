<?php

$conexion = new mysqli('localhost', 'root', '1234', 'almacen2019');

$conexion->set_charset("utf8");

//if ($conexion->connect_error)
//{ echo "No se ha podido establecer la conexión con el servidor.";}
//else{echo "Todo correcto.";}