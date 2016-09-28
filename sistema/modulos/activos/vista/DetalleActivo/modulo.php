<?php 
//DETALLES ACTIVOS

    //BASE DE DATOS

    include "sistema/controlador/basedatos/conn.php";

    //VALIDO PARAMETROS GET

    if($_GET){
    $get = isset( $_GET['id'] ) ? $_GET['id'] : '';
    }

    //EJECUTO PROCEDURE DETALLES ACTIVOS, CARGANDO POR GET
        
    $sql = sprintf("exec DetalleActivos @get ='$get'");
    $proceso = odbc_exec($odbc, $sql);

    //EJECUTO PROCEDURE DETALLES ACTIVOS, ACCION DEVUELVE TODOS LOS PROVEEDORES AFILIADO A ESTE ACTIVO

    $Proveedor = sprintf("exec DetallesActivosP @GET ='$get' ");
    $Proveedorexec= odbc_exec($odbc, $Proveedor);

///////////////////////////////////////////////////////////////////////////////////////////

// UNA VEZ EJECUTADO  DETALLES ACTIVOS DEVULEVO, EL ODBC_RESULT EN STRING

    $id = odbc_result($proceso, "IDActivo");
    $nombre = odbc_result($proceso, "Activo");
    $descripcion = odbc_result($proceso, "Descripcion");
    switch (odbc_result($proceso, "Serial")) {
        case 0 or false:
            $Vigente = 'NO';
        break;
        case 1 or true:
            $Vigente = 'SI';
        break;
            }
    $serial = odbc_result($proceso, "Serial");
    $FechaA = odbc_result($proceso, "Fecha_Adquisicion");
    $Costo_adquisicion = odbc_result($proceso, "Costo_adquisicion");
    $Vida_util = odbc_result($proceso, "Vida_util");
    $Saldo_a_depreciar = odbc_result($proceso, "Saldo_a_depreciar");
    $Ultimo_periodo = odbc_result($proceso, "Ultimo_periodo");
    $Periodo_saldo_cero = odbc_result($proceso, "Periodo_saldo_cero");
    $Fecha_incorporacion = odbc_result($proceso, "Fecha_incorporacion");
    $Fecha_desincorporacion = odbc_result($proceso, "Fecha_desincorporacion");
    $IDProveedor = odbc_result($proceso, "IDProveedor");
    $Proveedor = odbc_result($Proveedorexec, "Proveedor");//PROEVEEDOR LO EJECUTO CON EL "Proveedorexec"
    $SituacionD = odbc_result($proceso, "Situacion");
    $IDUbicacion = odbc_result($proceso, "IDUbicacion");
    // HAGO SWICHT PARA  CONVETIR EL TINYINT, SEA ENTENDIBLE PARA EL USUARIO FINAL
        switch (odbc_result($proceso, "Situacion")) {
            case 0:
                $Situacion = 'Sin Depreciar';
            break;
            case 1:
                $Situacion = 'Depreciandose';
            break;
            case 2:
                $Situacion = 'Depreciado';
            break;
            case 3:
                $Situacion = 'Desincorporado';
            break;
                }
///////////////////////////////////////////////////////////////////////////////////////////
?>
<div class="btn-group  pull-right">
    <a href="ujap.php?vista=EditarActivo&id=<? echo $get ?>" class="btn btn-warning">Modificar Activo</a>
    <a onclick="Eliminar_Activo(<?php echo odbc_result($proceso,"IDActivo");?>)" href="#" type="button" class="btn btn-danger">Desincorporar Activo</a>
</div>
<!-- Titulo -->
<h1>Detalles del Activo <b><? echo $nombre;?></b></h1>
<div class="panel-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
                <tr>
                    <th width="10%">Codigo del Activo:</th>
                    <td><? echo $id ?></td>
                </tr>
                <tr>
                    <th>Nombre del Activo:</th>
                    <td><? echo $nombre  ?></td>
                </tr>
                <tr>
                    <th>Descripcion:</th>
                    <td><? echo $descripcion ?></td>
                </tr>
                <tr>
                    <th>Utiliza Serial:</th>
                    <td> <? echo $Vigente ?> </td>
                </tr>
                <tr>
                    <th>Serial:</th>
                    <td> <? echo $serial ?> </td>
                </tr>
                <tr>
                    <th>Fecha de Adquisicion:</th>
                    <td> <? echo $FechaA ?> </td>
                </tr>
                <tr>
                    <th>Costo de Adquisicion:</th>
                    <td> <? echo $Costo_adquisicion ?> Bsf.</td>
                </tr>
                <tr>
                    <th>Vida Util:</th>
                    <td> <? echo $Vida_util ?> Meses</td>
                </tr>
                <tr>
                    <th>Saldo a depreciar:</th>
                    <td><font color="red"><? echo $Saldo_a_depreciar ?> Bsf</font></td>
                </tr>
                <tr>
                    <th>Ultimo Periodo:</th>
                    <? if ($Ultimo_periodo > 0) {?>
                      <td><a href="ujap.php?vista=DetallesPeriodo&id=<? echo $Ultimo_periodo ?>"><? echo $Ultimo_periodo ?></a></td>
                </tr>   
                <? } else{ ?>
                    <td>Aun no se deprecia</td>
                        <?}?>
                <? if ($Periodo_saldo_cero  > 0) {?>
                <tr>
                    <th>Periodo Saldo Cero:</th>
                    <td><a href="ujap.php?vista=DetallesPeriodo&id=<? echo $Periodo_saldo_cero ?>"><? echo $Periodo_saldo_cero ?></a></td>
                </tr>
                <? } ?>
                <tr>
                    <th>Fecha de Incorporacion:</th>
                    <td> <? echo $Fecha_incorporacion ?></td>
                </tr>
                <tr>
                    <th>Fecha de Desincorporacion</th>
                    <td> <? echo $Fecha_desincorporacion ?></td>
                </tr>
                <tr>
                    <th>Situacion</th>
                    <td> <? echo $Situacion?></td>
                </tr>
                <tr>
                    <th>Proveedor</th>
                    <td><a href="ujap.php?vista=DetalleProveedor&id=<? echo $IDProveedor ?>"><? echo $Proveedor?></a></td>
                </tr>
                <tr>
                    <th>Ubicacion</th>
                    <? if ($IDUbicacion  > 0) {?>
                        <td> <? echo $IDUbicacion ?></td>
                    <?} else {?>
                        <td><a href="ujap.php?vista=ReubicarActivo">Este Activo no se le ha asignado una ubicacion</a></td>
                    <?}?>
                </tr>
            </tbody>
        </table>
        <div class="btn-group  pull-left">
            <a href="ujap.php?vista=EditarActivo&id=<? echo $get ?>" class="btn btn-warning">Modificar Activo</a>
            <a onclick="Eliminar_Activo(<?php echo odbc_result($proceso,"IDActivo");?>)" href="#" type="button" class="btn btn-danger">Desincorporar Activo</a>
        </div>
    </div>
    <br>
    <?
        // A ESTE PUNTO CARGARE LAS DEPRECIACIONES AFILIADO A ESTE ACTIVO

        $Depreciaciones = sprintf("exec ListadoDepreciacionesPorActivos @get ='$get' ");
        $ejecutarDepreciaciones = odbc_exec($odbc, $Depreciaciones);

        //CON ESTA SENTENCIA SACARE EL MONTO ACOMULADO
        $SumaMontoAcomulado = sprintf("exec Consulta1 @get ='$get' ");
        $ejecutarsuma = odbc_exec($odbc, $SumaMontoAcomulado);
        $minimo = odbc_result($ejecutarsuma, "suma");
    ?>      
    <?php  //SI LA SITUACION ES 1(DEPRECIANDOSE), MONTRARA LA TABLA DE DEPRECIACIONES DEL ACTIVO
    if ($SituacionD >= 1) {// ?>
        <br><br><br>
        <table class="table table-striped table-bordered table-hover">
        <thead>
            <th width="6%">Periodo</th>
            <th width="6%">Estado</th>
            <th width="16%">Costo de Adquisicion</th>
            <th width="6%"><center>% Vida Util</center></th>
            <th width="17%">Saldo a Depreciar:</th>
            <th width="3%" ><center>=</center></th>
            <th>Valor del Activo:</th>
        </thead>
     <? $fila = 0;
     while (odbc_fetch_row($ejecutarDepreciaciones)) { ?>
        <tr class="odd gradeX">   
            <td><a href="ujap.php?vista=DetallesPeriodo&id=<? echo $PeridoD = odbc_result($ejecutarDepreciaciones, "Periodo"); ?>"><? echo $PeridoD = odbc_result($ejecutarDepreciaciones, "Periodo"); ?></a></td>
            <td><? switch (odbc_result($ejecutarDepreciaciones, "Vigente")) {
                case 0 or false:
                    $VigenteD = 'Inactivo';
                    break;
                
                case 1 or true:
                    $VigenteD = 'Activo';
                    break;
            } echo $VigenteD ?></td>
            <td><? echo $Costo_adquisicion?></td>
            <td><? echo $Vida_util ?></td>
            <td><? echo $Saldo_a_depreciar?></td>        
            <td><center>=</center></td>
            <td><font color="red"><? echo $MontoD = odbc_result($ejecutarDepreciaciones, "Monto_acomulado") + $Saldo_a_depreciar; ?></font></td>
        </tr>
        <? } $fila++; ?>     
    </table></div>
        <br>
        <?if ($minimo <= 0) {?>
            <h2>Coste actual del activo, <? echo $nombre;?> es de: <font color="red"><? echo $minimo ?> Bsf</font></h2>
            <h4><b> Se ha depreciado en su Totalidad</h4>   
            <?} else { ?>
                <h3><b>Coste actual del activo, <? echo $nombre;?> es de: <font color="red"><? echo $minimo ?></font> Bsf</h3></b>
                <h4><b>Aun no se ha depreciado en su Totalidad</h4></b>
            <? } ?>
    <?} else {?>
    <br><br><br><p class="alert alert-danger">* Aun no se ha Depreciado</p> 
    <? }?>
    <br><br>

