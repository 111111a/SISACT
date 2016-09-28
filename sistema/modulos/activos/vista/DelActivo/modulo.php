<?php
//ACCION DE BORRAR ACTIVOS


    //BASE DE DATOS
   include "sistema/controlador/basedatos/conn.php";
   
    //VALIDO PARAMETROS GET
    if($_GET)
        {
          $get = isset( $_GET['id'] ) ? $_GET['id'] : '';
         }
        
    //EJECUTO SENCTENCIA PARA ELIMINAR 
    //ACTIVOS MEDIANTE PARAMETROS GET QUE MANDARE 
    //POR UNA FUNCION DE JS QUE ESTA EN MENU.PHP
    $sql = sprintf("exec EliminarActivo @get ='$get'");
    $proceso = odbc_exec($odbc, $sql); 

    //CARGO CLASES DE REDIRIGIR LO MANDO AL LISTADO DE ACTIVOS
    sistema::redir("./ujap.php?vista=ListadoActivos");

?>