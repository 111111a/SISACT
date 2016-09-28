<?php
    //BASE DE DATOS
        include "sistema/controlador/basedatos/conn.php";

    //PARAMETRO GET
        if($_GET)
        {
        $get = isset( $_GET['id'] ) ? $_GET['id'] : '';
        }
    
    //DetallesPeriodo, SE ENCARGA EN DAR RESULATO DEL PERIODO
    $sql = sprintf("exec DetallesPeriodo @get ='$get'");
    $proceso = odbc_exec($odbc, $sql);

    //DetallesPeriodo2, SE ENCARGA EN DAR RESULATDO DE TODOS 
    //LOS ACTIVOS AFILIADO A ESTE PERIODO

    $sql2 = sprintf("exec DetallesPeriodo2 @get ='$get'");
    $proceso2 = odbc_exec($odbc, $sql2);
?>
<h1>Detalles del Periodo, <b><? echo odbc_result($proceso, "IDPeriodo") ?></b></h1>
<table class="table table-striped table-bordered table-hover">
    <? ?>
    <thead>
    	<th width="7%">Periodo</th>
        <th width="13%">Codigo de activos</th>
        <th width="16%">Nombre de activos</th>
        <th width="16%">Costo de Adquisicion</th>
        <th width="16%">Monto Acomulado</th>
        <th>Periodo vigente actual del activo</th>        
    </thead><br>
     <? $fila = 0;
     while (odbc_fetch_row($proceso)) { ?>
        <tr class="odd gradeX">
        	<td><? echo odbc_result($proceso, "IDPeriodo"); ?></td>   
            <td><? echo odbc_result($proceso, "IDA"); ?></td>
            <td><? echo odbc_result($proceso2, "Activo") ?></td>
        	<td><? echo odbc_result($proceso2, "Costo_adquisicion")  ?> Bsf</td>
        	<td><? echo odbc_result($proceso, "Monto_acomulado") ?> Bsf</td> 
            <td><a href="ujap.php?vista=DetallesPeriodo&id=<? echo $periodo = odbc_result($proceso2, "Ultimo_periodo"); ?>"><? echo $periodo?></a></td>        
        </tr>
        <? } $fila++; ?>      
</table>