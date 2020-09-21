<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       <?php
	include '../DAO/DAOOperaciones.php';
        
	$IdEstanteria=(int)$_REQUEST['id'];
	$arrayLejasDisponibles=DAOOperaciones::lejasDisponibles($IdEstanteria);
	foreach($arrayLejasDisponibles as $leja){
?>
	<option value="<?php echo $leja ?>"> <?php echo $leja ?></option>
<?php
	}
?>
    </body>
</html>
