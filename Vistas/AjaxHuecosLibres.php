<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       <?php
	include '../DAO/DAOOperaciones.php';
        
	$IdPasillo=(int)$_REQUEST['id'];
	$arrayHuecosDisponibles=DAOOperaciones::huecosDisponibles($IdPasillo);
	foreach($arrayHuecosDisponibles as $hueco){
?>
	<option value="<?= $hueco ?>"> <?= $hueco ?></option>
<?php
	}
?>
    </body>
</html>

