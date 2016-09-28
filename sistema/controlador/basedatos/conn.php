<?php

	$user = 'david'; // usuario de la db
	$password = '6146568'; //contraseña
	$dsn = 'Driver={SQL Server Native Client 11.0};Server=localhost;Database=sisact';


$odbc = odbc_connect(	

					$dsn, 
					$user, 
					$password
					
					);
if ($odbc) {
	echo "";
}else {
	echo "Hubo un error";
}
