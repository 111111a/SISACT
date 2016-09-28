<?php
   include "sistema/controlador/basedatos/conn.php";
        if($_GET)
        {
          $get = isset( $_GET['id'] ) ? $_GET['id'] : '';
         }
        
        //$get = $_GET['id'];
        $sql = sprintf("exec DesactivarPeriodo @get ='$get'");
        $proceso = odbc_exec($odbc, $sql); 
        sistema::redir("./ujap.php?vista=ListadoPeriodo");


?>