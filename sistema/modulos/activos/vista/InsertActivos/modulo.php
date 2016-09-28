<?php 
include "sistema/controlador/basedatos/conn.php";
	$NombreActivos = $_POST['Activo'];
	$DescripcionActivos = $_POST['Descripcion'];
	$BitSerial = $_POST['checkbox'];
	$Serial = $_POST['Serial'];
	$Fecha_A = $_POST['fecha_A'];
	$Referencia = $_POST['Referencia'];
	$costo1 = $_POST['costo1'];
	$fecha_I = $_POST['fecha_I'];
	$fecha_D = $_POST['fecha_D'];
	//$IDUbicacion = $_POST['IDUbicacion'];
	$Proveedor = $_POST['IDProveedor'];
	$VidaU = $_POST['VidaU'];
	$Null = $_POST[''];
	$SaldoDerpreciar = $costo1 / $VidaU;

$sql = "INSERT INTO dbo.ACTIVOS_FIJOS (
Activo, 
Descripcion, 
Utiliza_serial, 
Serial, 
Fecha_adquisicion, 
Referencia, 
Costo_adquisicion, 
Vida_Util, 
Saldo_a_depreciar, 
Fecha_incorporacion, 
Fecha_desincorporacion, 
IDProveedor, 
Situacion, 
Vigente
) 
values (
'$NombreActivos', 
'$DescripcionActivos', 
'$BitSerial', 
'$Serial', 
'$Fecha_A', 
'$Referencia', 
'$costo1', 
'$VidaU' , 
'$SaldoDerpreciar', 
'$fecha_I', 
'$fecha_D', 
'$Proveedor', 
'0',
'true'
)";
echo "<pre>";
	var_dump($sql);
	echo "</pre>";
		$proceso = odbc_exec($odbc, $sql);
		if ($sql==false) {
			echo "Hubo un error en el odbc.\n";
			die(print_r(odbc(), true));
		}
sistema::redir("./ujap.php?vista=ListadoActivos");



?>