<?php 
include "sistema/controlador/basedatos/conn.php";
$sql = sprintf("exec ListadoDepreciado");

$proceso = odbc_exec($odbc, $sql);
//------------------------------- para el while------------------------------------\\
$vigentesql = sprintf("exec Consulta2");
$vigenteexec = odbc_exec($odbc, $vigentesql);
$vigente = odbc_result($vigenteexec, "vigente");
//------------------------------- para el titulo------------------------------------\\            
$count = sprintf("exec contadorTitulo");
$contador = odbc_exec($odbc, $count);
 $titulo = odbc_result($contador, "contador");



?>
<div class="row">
	<div class="col-md-12">
	<div class="col-md-12">
<div class="btn-group  pull-right">
<? if ($vigente >=1) {?>
<? if ($titulo >= 0) {?>
	<a onclick="Desactivar_Periodo(<? echo ($titulo) ?>)" href="#" class="btn btn-danger">Cerrar Periodo Vigente: <? echo $titulo ?></a>
<? }elseif ($titulo <=0) {
	# code...
}}else{?>
	<a href="ujap.php?vista=NuevaDepreciacion" class="btn btn-success">Abrir Periodo</a>
	<?}?>
</div>
		<h1>Depreciaciones</h1>
		<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<br>
<table class="table table-bordered table-hover">
	<thead>
		<th width="8%">Estado</th>
		<th width="80%">Periodo</th>
		<th width="12%">Accion</th>
	</thead>
	<?php    while(odbc_fetch_row($proceso)) {?>
      <tr class="odd gradeX">
        <td><center>
        	<?php switch (odbc_result($proceso, "Vigente")) {
			case 0 or false:
			$vigente = 'Inactivo';
			break;
			case 1 or true:
			$vigente = 'Activo';
			break;
			}  echo $vigente;?></center></td>
            <td><?php echo odbc_result($proceso, "Periodo") ;?></td>
        <td>
        	<a href="ujap.php?vista=DetallesPeriodo&id=<?php echo odbc_result($proceso, "Periodo") ;?>">
	        	<button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-eye-open"></i> Detalles
	        	</button>
        	</a>
        </td>
     </tr>
           <?php } ?>

</table>

</div> </

<br><br><br><br><br><br><br><br><br><br>
	</div>
</div>