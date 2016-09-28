<?php 	
	include "sistema/controlador/basedatos/conn.php";
	$Proveedor = $_POST['Proveedor'];
	$Descripcion = $_POST['Descripcion'];
	$sql = sprintf  ("exec NuevoProveedores @Proveedor ='$Proveedor', @Descripcion = '$Descripcion'" );
	$proceso = odbc_exec($odbc, $sql);
	sistema::redir("./ujap.php?vista=ListaProveedoresT");

?>

