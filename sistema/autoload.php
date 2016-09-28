<?php
    
    //App, cargar el init.php del modulo del "sistema::cargarModulo("activos")"
        include "controlador/App.php";

    //Modulo, cagar el archivo menu y valida los parametros URL
        include "controlador/Modulo.php";
    
    //Sistema, cargar la informacion del init, cuya funcion es cargar Modelo y la Vista
        include "controlador/Sistema.php";

    //Vista, controlador a cargo de la vista del sistema, cargara los modulos de las carpeta, y la valida como get
        include "controlador/Vista.php";


?>