<?php
    //BASE DE DATOS
    include "sistema/controlador/basedatos/conn.php";
    
    //PARAMETROS GET
    $IDA = intval($_GET['id']);

    //SQL PARA EL AJAX DE REUBICACION DE ACTIVOS
    $sql = sprintf("exec Consulta4 @POST ='$IDA'");
            $proceso = odbc_exec($odbc, $sql); 
    echo "<table>
    <tr>
    <th>Activo ubicado, Actualmente en:</th>
    </tr>";
    while($row =odbc_fetch_array($proceso)) {
        if ($row['IDUbicacion'] > 1){
        echo "<tr>";
        echo "<td>" . $row['IDUbicacion'] . "</td>";
        echo "</tr>";
        }else{ 
            echo "<tr>";
            echo "<td> Aun no tiene ubicacion, asignale uno!</td>";
            echo "</tr>";;
        }
    }
    echo "</table>";




?>