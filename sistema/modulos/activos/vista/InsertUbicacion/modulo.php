<?php 	
	include "sistema/controlador/basedatos/conn.php";
	$Ubicacion = $_POST['Ubicacion'];
	$Descripcion = $_POST['Descripcion'];
	$sql = sprintf  ("exec NuevaUbicacion @Ubicacion ='$Ubicacion', @Descripcion = '$Descripcion'" );
	$proceso = odbc_exec($odbc, $sql);
	sistema::redir("./ujap.php?vista=ListadoUbicaciones");

?>

