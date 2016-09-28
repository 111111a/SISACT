<?php

	$user = ''; // usuario de la db
	$password = ''; //contraseña
	$dsn = 'Driver={SQL Server Native Client 11.0};Server=localhost;Database=sisact';
	$odbc = odbc_connect(	
		$dsn, 
		$user, 
		$password
		);
