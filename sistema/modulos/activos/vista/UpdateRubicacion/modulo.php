<?php 	
	include "sistema/controlador/basedatos/conn.php";
	$IDActivo = $_POST['IDActivo'];
	$IDUbicacion = $_POST['IDUbicacion'];
	$fecha_I = $_POST['Descripcion'];
	$notas = $_POST['notas'];
	
	$sql = sprintf  ("exec AtualizarProveedores @get='$get', @Proveedor='$Proveedor', @Descripcion= '$Descripcion' " );
	echo "<pre>";
	var_dump($sql);
	echo "</pre>";
		$proceso = odbc_exec($odbc, $sql);
		if ($sql==false) {
			echo "Hubo un error en el odbc.\n";
			die(print_r(odbc(), true));
		}
	//sistema::redir("./ujap.php?vista=DetalleProveedor&id=$get");

?>
