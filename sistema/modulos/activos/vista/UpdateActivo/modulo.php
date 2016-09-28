<?php 	
	include "sistema/controlador/basedatos/conn.php";
	$get = $_POST['id'];
	$activo = $_POST['activo'];
	$Descripcion = $_POST['Descripcion'];
	$serial = $_POST['serial'];
	$Referencia = $_POST['Referencia'];
	$IDProveedor = $_POST['IDProveedor'];
	
	$sql = sprintf  ("exec AtualizarActivo @get='$get', @activo='$activo', @Descripcion= '$Descripcion', @serial = '$serial', @Referencia = '$Referencia', @IDProveedor = '$IDProveedor'  " );
	//$proceso = odbc_exec($odbc, $sql);
	//sistema::redir("./ujap.php?vista=DetalleProveedor&id=$get");
	echo "<pre>";
	var_dump($sql);
	echo "</pre>";
		$proceso = odbc_exec($odbc, $sql);
		if ($sql==false) {
			echo "Hubo un error en el odbc.\n";
			die(print_r(odbc(), true));
		}

?>
