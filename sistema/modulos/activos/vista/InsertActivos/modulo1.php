<?php 
include "sistema/controlador/basedatos/conn.php";
	$NombreActivos = $_POST['Activo'];
	$DescripcionActivos = $_POST['Descripcion'];
	$BitSerial = $_POST['Bit'];
	$Serial = $_POST['Serial'];
	$Fecha_A = $_POST['fecha_A'];
	$Referencia = $_POST['Referencia'];
	$costo1 = $_POST['costo1'];
	$fecha_I = $_POST['fecha_I'];
	$fecha_D = $_POST['fecha_D'];
	$Proveedor = $_POST['IDProveedor'];
	$VidaU = $_POST['VidaU'];
	$Null = $_POST[''];

$sql = sprintf("exec NuevoActivo @Activo = '$NombreActivos', @Descripcion = '$DescripcionActivos', @Utiliza_serial = 'false', @Serial = '$Serial', @Fecha_Adquisicion = '01-01-1981', @Referencia = '$Referencia', @Vida_util = '$VidaU', @Costo_adquisicion = '$costo1', @Saldo_a_depreciar = '500', @Fecha_incorporacion = '01-01-1981', @Fecha_desincorporacion = '01-01-1981', @IDProveedor = '1000', @Situacion = '3'");
/*
	$sql = sprintf("execute AgregarActivos "
			."@Activo = '".$NombreActivos."', "
			."@Descripcion = '".$DescripcionActivos."'," 
			."@Utiliza_serial = '".$BitSerial."', " 
			."@Serial = '".$Serial."', "
			."@Fecha_Adquisicion = '".$Fecha_A."', "
			."@Referencia = '".$Referencia."', "
			."@Costo_adquisicion = '".$costo1."', "
			."@Vida_util ='".$VidaU."', "
			."@Saldo_a_depreciar='".$Null."', "
			."@Ultimo_periodo='".$Null."', "
			."@Periodo_saldo_cero='".$Null."', "
			."@Fecha_incorporacion = '".$fecha_I."', "
			."@Fecha_desincorporacion = '".$fecha_D."', "
			."@IDProveedor = '".$Proveedor."' " 
			);*/
	echo "<pre>";
	var_dump($sql);
	echo "</pre>";
		$proceso = odbc_exec($odbc, $sql);
		if ($sql==false) {
			echo "Hubo un error en el odbc.\n";
			die(print_r(odbc(), true));
		}
		//odbc_free_result($proceso);
?>
