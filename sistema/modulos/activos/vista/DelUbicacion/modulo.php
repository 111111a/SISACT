<?php

//ACCION DE BORRAR UBICACION
    
    //BASE DE DATOS

   include "sistema/controlador/basedatos/conn.php";

    //VALIDO PARAMETROS GET

        if($_GET)
        {
          $get = isset( $_GET['id'] ) ? $_GET['id'] : '';
         }
        
    //EJECUTO SENTENCIA PARA BORRAR UBICACION

    $sql = sprintf("exec EliminarUbicaciones @get ='$get'");
    $proceso = odbc_exec($odbc, $sql); 

        //CARGO CLASES LO REDIRIGO
        sistema::redir("./ujap.php?vista=ListadoUbicaciones");


?>