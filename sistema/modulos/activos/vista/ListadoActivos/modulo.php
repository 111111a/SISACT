<?php 
include "sistema/controlador/basedatos/conn.php";
$sql = sprintf("exec Listadoactivos");
$proceso = odbc_exec($odbc, $sql);
?>
<div class="row">
	<div class="col-md-12">
	<div class="btn-group  pull-right">
	<a href="ujap.php?vista=NuevoActivos" class="btn btn-success">Agregar Activo</a>
<div class="btn-group pull-right">
  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
    <i class="glyphicon glyphicon-home"></i> Ubicacion <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="ujap.php?vista=ReubicarActivo">Reubicar</a></li>
    <li><a href="ujap.php?vista=ReubicarActivo">Historial de Reubicacion</a></li>
  </ul>
</div>
</div>

		<h1>Lista de Activos</h1>
		<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<br>
<table class="table table-bordered table-hover">
	<thead>
		<th width="8%">Codigo</th>
		<th width="80%">Activos</th>
		<th width="12%">Accion</th>
	</thead>
	<?php    while(odbc_fetch_row($proceso)) {?>
        <tr class="odd gradeX">
           <td>
           	<center><?php echo odbc_result($proceso,"IDActivo");?></center>
           </td>
           <td>
            <?php echo odbc_result($proceso,"Activo");?>
            </td>
            <td>
            	<a href="ujap.php?vista=DetalleActivo&id=<?php echo odbc_result($proceso,"IDActivo")?>"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-eye-open"></i> Detalles</button>
            	</a>
            </td>                                           
		<tr>
           <?php } ?>

</table>

</div> </

<br><br><br><br><br><br><br><br><br><br>
	</div>
</div>