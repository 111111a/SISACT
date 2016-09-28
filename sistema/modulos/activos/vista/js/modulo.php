<?


	///CONEXCION DE BASE DE DATOS
	include "sistema/controlador/basedatos/conn.php";

		///// invocar datos de get
		if($_GET)
        {
          $get = isset( $_GET['id'] ) ? $_GET['id'] : '';
         }
        // invocar datos 
		$sql = sprintf("exec ListarProveedoresActivos");
		$proceso = odbc_exec($odbc, $sql); //ejecuto la sentencia sql

		//resultado ordenado
		$resultadoOrdenado = array();

		while ($objetoProveedor = odbc_fetch_array($proceso)) {
			.$objetoProveedor["ID"];
			.$objetoProveedor["Proveedor"];
			.$objetoProveedor["Descripcion"];
			.$objetoProveedor["Vigente"];
			/// inserta el objeto con los datos de registro, dentro del arreglo general
	   		array_push($resultadoOrdenado, $objetoProveedor);
		}
		/// una vez populado el arreglo general con datos, se convierte a Json
		echo json_encode($resultadoOrdenado, JSON_UNESCAPED_UNICODE );
		?>


