<?php 
  include "sistema/controlador/basedatos/conn.php";
        $sql = sprintf("exec NuevaDepreciacion");
        $proceso = odbc_exec($odbc, $sql); 
        sistema::redir("./ujap.php?vista=ListadoPeriodo");


?>