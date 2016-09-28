<?php
    class sistema {
        public static function cargarModulo($modulo){
                if(!isset($_GET['modulo'])){
                    Modulo::setModulo($modulo);
                    include "sistema/modulos/".$modulo."/init.php";
                }else{
                    modulo::setmodulo($_GET['modulo']);
                    if(modulo::isValid()){
                        include "sistema/modulos/".$_GET['modulo']."/init.php";
                    }else {
                        Modulo::Error();
                    }
                }

        }

        public static function redir($url){
            echo "<script>window.location=\"$url\";</script>";
        }

    }
?>