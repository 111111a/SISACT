<?php 
    include "sistema/controlador/basedatos/conn.php";
    $sql = sprintf("exec ListadoUbicaciones");
    $proceso = odbc_exec($odbc, $sql);
    //
?>
<div class="row">
	<div class="col-md-12">
        <div class="btn-group  pull-right">
	   <a href="ujap.php?vista=NuevaUbicacion" class="btn btn-success">Agregar Ubicacion</a>
        </div>
		<h1>Listado de Ubicaciones</h1>
    </div>
    <br>
    <table class="table table-bordered table-hover">
        <thead>
            <th width="7%">Codigo</th>
            <th width="15%">Nombre:</th>
            <th width="60%">Descripcion:</th>
            <th width="19%">Accion:</th>
        </thead>
	<?php  while(odbc_fetch_row($proceso)) {?>
      <tr class="odd gradeX">
        <td><center><?php echo odbc_result($proceso,"ID");?></center></td>
        <td><?php echo odbc_result($proceso,"Ubicacion");?></td>
        <td><?php echo odbc_result($proceso,"Descripcion");?></td>
        <td>
            <div class="btn-group  pull-right">
            <a class="btn btn-warning" href="ujap.php?vista=EditarUbicacion&id=<? echo odbc_result($proceso,"ID");?>">Modificar </a>
            <a class="btn btn-danger" onclick="eliminar_Ubicacion(<?php echo odbc_result($proceso,"id");?>)" href="#">Eliminar</a>
            </div>
        </td>
     </tr>
   <?php }?>
    </table><br><br><br><br><br><br><br><br><br><br>
</div> 


	