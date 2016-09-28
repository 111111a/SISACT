<?php 
//-----------------------------Consulta-------------------------------------\\
        include "sistema/controlador/basedatos/conn.php";
        if($_GET)
        {
          $get = isset( $_GET['id'] ) ? $_GET['id'] : '';
         }
        
        //$get = $_GET['id'];
        $sql = sprintf("exec DetallesProveedor @get ='$get'");
        $proceso = odbc_exec($odbc, $sql); 

                /*Valido GET Obtengo datos del get la paso al @get */

//------------------------------- para el while------------------------------------\\
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
            

            // termina el select del proveedor

            //Seleciono select activo
            $activoid = odbc_result($proceso, "CodigoActivo");
            $activonombre = odbc_result($proceso, "NombreActivo");
           // $activoafiliado = odbc_result($proceso, "Afiliado");

        


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
        <!-- /.table-responsive -->
        <br><br>
            <table class="table table-bordered table-hover">
            <thead>
                <th width="15%">Codigo del Activo</th>
                <th width="60%">Nombre del Activos</th>
                <th width="10%">Accion</th>
            </thead>
            <?
           
            while (odbc_fetch_row($proceso)) { ?>
            <tr>
                <td><?php echo $activoid ;?></td>
                <td><?php echo $activonombre; ;?></td>
                <td><a href="ujap.php?vista=DetalleActivo&id=<?php echo $activoid ;?>"><button type="button" class="btn btn-primary">Detalles</button></a>
                </td>
            </tr>
            <? 
             
            }
            ?>
</table>
<br><br>
   
