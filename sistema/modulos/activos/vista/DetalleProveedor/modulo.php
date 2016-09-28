<?php 
//DETALLES PROVEEDOR
    
    //BASE DE DATOS
        include "sistema/controlador/basedatos/conn.php";

    //PARAMETRO GET

        if($_GET)
        {
            $get = isset( $_GET['id'] ) ? $_GET['id'] : '';
        }

    //EJECUTO LA SEENTENCIA DEL DETALLES PROVEEDOR CUYA WHERE ES EL GET
        $sql = sprintf("exec detallesproveedor @get ='$get'");
        $proceso = odbc_exec($odbc, $sql); 

    
    //CAMBIO LOS VALORES

        $proveedorid = odbc_result($proceso, "id");
        $proveedornombre = odbc_result($proceso, "Proveedor");
        $proveedordescripcion = odbc_result($proceso, "Descripcion");
        switch (odbc_result($proceso, "Vigente")) {
            case 0 or false:
                $proveedorvigente = 'Inactivo';
            break;
            case 1 or true:
                $proveedorvigente = 'Activo';
             break;
                } 
//////////////////////////////////////////////////////////////////////////////    
?>
<!-- Titulo -->
<h1>Detalles del Proveedor <b><? echo $proveedornombre;?></b></h1>
    <div class="panel-body">
       <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <tbody>
                    <tr>
                        <th width="10%">Codigo del proveedor</th>
                        <td><? echo $proveedorid?></td>
                    </tr>
                    <tr>
                        <th>Proveedor</th>
                        <td><? echo $proveedornombre ?></td>
                    </tr>
                    <tr>
                        <th>Descripcion</th>
                            <td><? echo $proveedordescripcion ?></td>
                    </tr>
                    <tr>
                        <th>Estado</th>
                           <td> <? echo $proveedorvigente ?> </td>
                    </tr>
                </tbody>
            </table>
            <a href="ujap.php?vista=EditarProveedor&id=<? echo $get ?>"><button type="button" class="btn btn-info">MODIFICAR</button>
            </a>
            <a onclick="desactivar(<?php echo odbc_result($proceso,"id");?>)" href="#"><button type="button" class="btn btn-warning">DESACTIVAR</button>
            </a>
            <a onclick="eleminar_proveedor(<?php echo odbc_result($proceso,"id");?>)" href="#"><button type="button" class="btn btn-danger">ELIMINAR</button>
            </a>
        </div>
        <br>
       
    <?  //HA ESTE PUNTO VERIFICO SI HAY UN ACTIVO AFILIADO A ESTE PROVEEDOR SI LO HAY MUESTO ACTIVO
        //DE LO CONTRARIO NO
        
        $sql1 = sprintf("exec DetallesProveedor2 @get ='$get'");
        $proceso1 = odbc_exec($odbc, $sql1);
        $contador = odbc_result($proceso1, "IDActivo");
            
        // IF PARA CONCPROBAR
            if ($contador > 1) { 
    ?>
        
       <table class="table table-striped table-bordered table-hover">
            <thead>
                <th width="10%">Codigo de activos</th>
                <th>Nombre de activos</th>
                <th>Descripcion de activos</th>
                <th>Vigente</th>        
            </thead>
     <? $fila = 0;
     while (odbc_fetch_row($proceso1)) { ?>
        <tr class="odd gradeX">
            <td><? echo $id = odbc_result($proceso1, "IDActivo"); ?></td>   
            <td><a href="ujap.php?vista=DetalleActivo&id=<? echo $id ?>">
            <? echo odbc_result($proceso1, "Activo"); ?></a></td>
            <td><? echo odbc_result($proceso1, "Descripcion") ?></td>
            <td><? switch (odbc_result($proceso1, "Situacion")) {
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
                } echo $Situacion; ?>
            </td>
        </tr>
        <? } $fila++; }
        else{?> 
         <br><br><p class="alert alert-danger">Este proveedor no tiene activos afiliado</p>
		<?}?>
<br><br>
   
