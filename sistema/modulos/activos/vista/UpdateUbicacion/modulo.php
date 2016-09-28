<?php 	
	include "sistema/controlador/basedatos/conn.php";
	$get = $_POST['id'];
	$Ubicacion = $_POST['Ubicacion'];
	$Descripcion = $_POST['Descripcion'];
	
	$sql = sprintf  ("exec AtualizarUbicacion @get='$get', @Ubicacion='$Ubicacion', @Descripcion= '$Descripcion' " );
	$proceso = odbc_exec($odbc, $sql);
	sistema::redir("./ujap.php?vista=ListadoUbicaciones");
	/*
	echo "<pre>";
	var_dump($sql);
	echo "</pre>";
		$proceso = odbc_exec($odbc, $sql);
		if ($sql===false) {
			echo "Hubo un error en el odbc.\n";
			die(print_r(odbc(), true));
		}
		odbc_free_result($proceso);
*/
?>
