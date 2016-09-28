<?php 
include "sistema/controlador/basedatos/conn.php";
$sql = sprintf("exec ListarProveedores");
$proceso = odbc_exec($odbc, $sql);
?>
<div class="row">
	<div class="col-md-12">
		<h1>Informe resumido proveedores</h1>
	</div>
	<div class="col-md-12">
	<?php while(odbc_fetch_row($proceso)) {?>
		<br>
		<h3>Detalles del Proveedor <b><? echo odbc_result($proceso, "Proveedor");?></b></h1>
		<div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
				<tbody>
                    <tr>
                        <th width="26%">Codigo del proveedor</th>
                        <td><? echo $id = odbc_result($proceso, "ID") ?></td>
                    </tr>
                    <tr>
                        <th width="26%">Vigente</th>
                        <td><?switch (odbc_result($proceso, "Vigente")) {
                                case 0 or false:
                                    $proveedorvigente = 'Inactivo';
                                    break;
                                
                                case 1 or true:
                                    $proveedorvigente = 'Activo';
                                    break;
                            } echo $proveedorvigente ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Numeros de activos</th>
                        <td><?
                        	$sql1 = sprintf("exec RESPROVEEDOR @ID = '$id'");
							$proceso1 = odbc_exec($odbc, $sql1);
							echo odbc_result($proceso1, "contador");?></td>
                    </tr>
                    <tr>
                        <th>Monto de adquisicion de todos los activos</th>
                            <td><?
                        	$sql2 = sprintf("exec RESPROVEEDOR2 @ID = '$id'");
							$proceso2 = odbc_exec($odbc, $sql2);
							echo odbc_result($proceso2, "contador");?></td>
                    </tr>
                    <tr>
                        <th>Saldo a depreciar de los activos</th>
                           <td><?
                        	$sql3 = sprintf("exec RESPROVEEDOR3 @ID = '$id'");
							$proceso3 = odbc_exec($odbc, $sql3);
							echo odbc_result($proceso3, "contador");?></td>
                    </tr>
                    	
                </tbody>
            </table>
    <?php } ?>
        </div>
		
</div><br><br><br><br><br><br><br><br><br><br>


