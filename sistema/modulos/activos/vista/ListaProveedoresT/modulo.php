<?php 
    //BASE DE DATOS
    include "sistema/controlador/basedatos/conn.php";

    //A ESTE PUNTO EJECUTA EL PROCEDURE, PARA  UN LISTADO

    $sql = sprintf("exec ListarProveedoresActivos");
    $proceso = odbc_exec($odbc, $sql);
    
    //CONTADOR PARA SABER SI HAY UN PROVEEDOR
    $sql1 = sprintf("exec Consulta6");
    $proceso1  = odbc_exec($odbc, $sql1);
    $id = odbc_result($proceso1, "CONTADO");
?>
<div class="row">
	<div class="col-md-12">
		<div class="btn-group  pull-right">
  			<a href="ujap.php?vista=ListaProveedoresF" class="btn btn-warning"><i class="glyphicon glyphicon-th-list"></i> Proveedores Inactivos </a>
			<div class="btn-group  pull-right">
				<a href="ujap.php?vista=NuevoProveedor" class="btn btn-success"><i class="glyphicon glyphicon-user"></i> Agregar Proveedor</a>
			</div>
		</div>
		<h1>Lista de Proveedores Activos</h1>
		<?php if ($id > 1) { ?>
	</div>
		<br>
		<table class="table table-bordered table-hover">
			<thead>
				<th width="8%">Codigo</th>
				<th width="80%">Proveedor</th>
				<th width="12%">Accion</th>
			</thead>
			<?php    while(odbc_fetch_row($proceso)) {?>
    			<tr class="odd gradeX">
                    <td><center><?php echo odbc_result($proceso,"id");?></center></td>
                    <td><?php echo odbc_result($proceso,"Proveedor");?></td>
                    <td><a href="ujap.php?vista=DetalleProveedor&id=<?php echo odbc_result($proceso,"id")?>">
                    <button type="button" class="btn btn-success"><i class="glyphicon glyphicon-eye-open"></i> Detalles</button></a></td>
                </tr>
           <?php } ?>
		</table>
		<?}else{?>
 			<br><br><p class="alert alert-danger">Aun, no hay proveedores</p>
		<?}?>
</div><br><br><br><br><br><br><br><br><br><br>


