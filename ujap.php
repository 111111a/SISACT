<?php
	//NOTA: Framework pequeño elaborado para la Universidad Jose Antonio Paez
	
    //NOTA: Defino
	   define("ROOT", "ujap");	
    
	//NOTA: con este include carga todas las clases y controladores
        include "sistema/autoload.php";
	
	//NOTA: Cargamos el modulo de activos iniciar.
		sistema::cargarModulo("activos");
        //NOTA: @activos, es el modulo que cargar, este modulo se encuentra em sistema/modulos/activos
	
	//NOTA: Al cambiar el nombre de este archivo cambiar todas las url,
	//NOTA: Al cambiar las url recuerde que tambien hay que cambiar el html
	//NOTA: Este Proyecto, esta elaborado y disenado por David Lara
	//Liciencia GPL


    //NOTA: SI DA ERROR DE UTC IR AL PHP.INI Y MODIFICARLA SIGUIENTES LINEA

    /*
    [Date]
    ; Defines the default timezone used by the date functions
    ; http://php.net/date.timezone
    date.timezone = Caracas/Venezuela
    */
?>