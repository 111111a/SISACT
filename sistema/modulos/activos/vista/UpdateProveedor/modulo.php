<?php 	
	include "sistema/controlador/basedatos/conn.php";
	$get = $_POST['id'];
	$Proveedor = $_POST['Proveedor'];
	$Descripcion = $_POST['Descripcion'];
	
	$sql = sprintf  ("exec AtualizarProveedores @get='$get', @Proveedor='$Proveedor', @Descripcion= '$Descripcion' " );
	$proceso = odbc_exec($odbc, $sql);
	sistema::redir("./ujap.php?vista=DetalleProveedor&id=$get");

?>
