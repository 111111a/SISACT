<?php
    class Vista{
        //Vista.php, corresponde a cada componente visual dentro de un modulo.
        public static function cargar($vista){
            
           //Aqui cargo los archivo dentro las carpeta 
            if(!isset($_GET['vista'])){
                include "sistema/modulos/".Modulo::$modulo."/vista/".$vista."/modulo.php";
            }else{

                if(Vista::Validar()){
                    include "sistema/modulos/".Modulo::$modulo."/vista/".$_GET['vista']."/modulo.php";	
                }else{
                    // valido si todo es correcto y de lo contrario hay un error lanzo Vista::Error			
                    Vista::Error("<b>404 No se Encontro </b> en la carpeta <b>".$_GET['vista']."</b> !!");
                }



            }
        }

        // verifico exitensia de la vista del modulo
       
        public static function Validar(){
            $validar=false;
            if(file_exists($file = "sistema/modulos/".Modulo::$modulo."/vista/" .$_GET['vista']."/modulo.php")){
                $validar = true;
            }
            return $validar;
        }
            // llamo error, si hay un problema imprime el error con la vista de las variables get
        public static function Error($mensaje){
            print $mensaje;
        }

    }
?>