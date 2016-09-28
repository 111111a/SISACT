<!DOCTYPE html>
<html lang="es-VE">
  <!-- Abre head -->
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=" Modulo Ujap de Activos Fijos">
    <!-- Favicon -->
    <link rel="shortcut icon" href="http://w3.ujap.edu.ve/wp-content/uploads/2013/08/ujapicon.ico" title="Favicon">
    <!-- Autor -->
    <meta name="author" content="David Lara">
    <!-- Titutlo de la pagina-->
    <title>Modulos Activos Fijos UJAP</title>
    <!-- Cargas los css -->
  <link href="libs/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="libs/sb-admin/css/sb-admin.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <script src="libs/sb-admin/js/jquery-1.10.2.js"></script>
    
    <script>
      //Aqui Atualizo a false para que se desactive, literalmente como un eleminado logico
      function desactivar(id_to_desactivar)
      {
        var confirmation = confirm('¿Está seguro de que desea Desactivar el ID ' + id_to_desactivar + '?');
        if(confirmation)
        {
          window.location = "ujap.php?vista=DesactivarProveedor&id=" + id_to_desactivar;
        }
      }

      //boy eleminado
       function eleminar_proveedor(id_to_eleminar)
      {
        var confirmation = confirm('Al eleminar este proveedor los articulos relaccionado, quedara sin proveedor a ¿Está seguro de que desea Eliminar el proveedor  ' + id_to_eleminar + '?');
        if(confirmation)
        {
          window.location = "ujap.php?vista=DelProveedor&id=" + id_to_eleminar;
        }
      }

       function eliminar_Ubicacion(id_to_eleminar)
      {
        var confirmation = confirm('Al eliminar esta ubicacion  los articulos relaccionado, quedara sin ubicacion ¿Está seguro de que desea Eliminar la ubicacion  ' + id_to_eleminar + '?');
        if(confirmation)
        {
          window.location = "ujap.php?vista=DelUbicacion&id=" + id_to_eleminar;
        }
      }

      function Eliminar_Activo(id_to_eleminar)
      {
        var confirmation = confirm('Al desincorporar el activo con ID: '+ id_to_eleminar + ',  no se depreciara mas, tampoco se va incluir en los reportes ni en el listado.');
        if(confirmation)
        {
          window.location = "ujap.php?vista=DelActivo&id=" + id_to_eleminar;
        }
      }

      function Desactivar_Periodo(id_to_eleminar)
      {
        var confirmation = confirm('Al cerrar el Periodo vigente, no se podrar abrir nuevamente  ' + id_to_eleminar + '?');
        if(confirmation)
        {
          window.location = "ujap.php?vista=DesactivarPeriodo&id=" + id_to_eleminar;
        }
      }
    function IDA(str) {
        if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else { 
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","ujap.php?vista=AjaxReubicacion&id="+str,true);
            xmlhttp.send();
        }
    }

</script>
  </head>
  <!-- Cierra head -->
  <!-- Abre Body -->
  <body>
    <div id="wrapper">
      <!-- Diseno Barra izquierda(navbar) -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Diseno mobiles -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Navegacion</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Titulo del navbar  -->
          <a class="navbar-brand" href="./ujap.php">Universidad Jose Antonio Paez
            <sup>
            <!-- Titulo pequeno del navbar  -->
              <small>
                <span class="label label-primary">ACTIVOS FIJOS
                </span>
              </small>
            </sup> 
          </a>
        </div>
        <!-- Menu Lateral Izquierdo -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
          <li><a href="ujap.php?vista=Inicio"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>

          <li><a href="ujap.php?vista=ListaProveedoresT"><i class="glyphicon glyphicon-user"></i> Proveedores</a></li>
          <li><a href="ujap.php?vista=ListadoUbicaciones"><i class="glyphicon glyphicon-folder-close"></i> Ubicaciones</a></li>
          <li><a href="ujap.php?vista=ListadoActivos"><i class="glyphicon glyphicon-shopping-cart"></i> Activos</a></li>
          <li><a href="ujap.php?vista=ListadoPeriodo"><i class="glyphicon glyphicon-list-alt"></i> Periodo</a></li>
          <li><a href="ujap.php?vista=ListadoPeriodo"><i class="glyphicon glyphicon-print"></i> Reportes</a></li>
          </ul>
        <!-- Menu del navbad derecho -->
          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
                <a href="#" class="dropdown-toggle">
                    <b>Hora del servidor:<?php echo date("G:H:s");?></b>
                </a>
              </li>
           </ul>
          <!-- /.cierro navbar-->
        </div>
       </nav>
   
       <!-- aqui cargara todo el load de las vista-->
    <div id="page-wrapper">
         <?php 
          // puedo cargar otras funciones iniciales
          // dentro de la funcion donde cargo la vista actual
          // como por ejemplo cargar el corte actual
          Vista::cargar('inicio');
        ?>      
    </div>
    </div>
  
        <!-- /cierro la page del wrapper -->
    <!-- cargar JavaScript -->
    <script src="libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="libs/bootstrap/datepicker/js/bootstrap-datepicker.js"></script>
  </body>
</html>
