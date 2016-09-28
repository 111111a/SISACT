<?php
//cargo configuraciones
class moduloapp {

	public function moduloapp($modulo){
		$this->loadmodulo($modulo);

	}

	public  function cargarmodulo($modulo){
			if(!isset($_GET['modulo'])){
				modulo::setmodulo($modulo);
				include "sistema/modulos/".$modulo."/init.php";
			}else{
				modulo::setmodulo($_GET['modulo']);
				if(modulo::isValid()){
					include "sistema/modulos/".$_GET['modulo']."/init.php";
				}else {
					modulo::Error();
				}
			}

	}

}


