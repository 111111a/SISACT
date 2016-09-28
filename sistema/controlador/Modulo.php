<?php

class modulo {
	public static $modulo;
	public static $vista;
	public static $message;

	public static function setModulo($modulo){
		self::$modulo = $modulo;
	}

	public static function VistaActivo(){
		include "sistema/modulos/".Modulo::$modulo."/vista/menu.php";
	}


	// validacion del modulo
	public static function inValido(){
		$validar = false;
		$carpeta = "sistema/modulos/".modulo::$modulo;
		
			if(is_dir($carpeta)){
				$validar=true;

			}else { self::$mensaje= "<b>Error 404</b> modulo <b>".Modulo::$modulo."</b> No se Encuentra !!"; }
		
	
		return $validar;
	}

	public static function Error(){
		echo self::$mensaje;
		die();
	}

}



?>