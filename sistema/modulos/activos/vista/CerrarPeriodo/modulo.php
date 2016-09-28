<?php
//ACCION DE DESACTIVAR PERIODOS

    //BASE DE DATOS
    include "sistema/controlador/basedatos/conn.php";

    //VALIDO PARAMETROS GET
        if($_GET)
        {
          $get = isset( $_GET['id'] ) ? $_GET['id'] : '';
         }
        
     //EJECUTO SENTENCIA PARA CEERAR PERIODO
        $sql = sprintf("exec DesactivarPeriodo @get ='$get'");
        $proceso = odbc_exec($odbc, $sql); 

    //CARGO CLASES LO REDIRIGO A LISTADO PEIRODO
        sistema::redir("./ujap.php?vista=ListadoPeriodo");

?>