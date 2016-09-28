<?php
   include "sistema/controlador/basedatos/conn.php";//BASE DE DATOS
        if($_GET)
        {
          $get = isset( $_GET['id'] ) ? $_GET['id'] : '';
         }
        
        $sql = sprintf("exec DesactivarProveedor @get ='$get'");
        $proceso = odbc_exec($odbc, $sql); 
       sistema::redir("./ujap.php?vista=DetalleProveedor&id=$get");


?>