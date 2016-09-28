<?php
//ACCION DE ELIMINAR PROVEEDOR
//ACTIVOS

    //BASE DE DATOS
    include "sistema/controlador/basedatos/conn.php";

    //VALIDO PARAMETROS GET
        if($_GET)
        {
          $get = isset( $_GET['id'] ) ? $_GET['id'] : '';
         }
        
    //EJECUTO SENTENCIA PARA ELIMINAR PROVEEDOR
    $sql = sprintf("exec EleminarProvedores @get ='$get'");
    $proceso = odbc_exec($odbc, $sql); 

    //CARGO CLASES LO REDIRIGO AL LISTADO DE PROVEEDOR 
    //ACTIVOS
    sistema::redir("./ujap.php?vista=ListaProveedoresT");

?>