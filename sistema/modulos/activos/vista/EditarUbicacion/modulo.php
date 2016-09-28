<?php 
//-----------------------------Consulta-------------------------------------\\

        include "sistema/controlador/basedatos/conn.php";
        if($_GET)
        {
          $get = isset( $_GET['id'] ) ? $_GET['id'] : '';
       }  
        
        //$get = $_GET['id'];
        $sql = sprintf("exec DetallesUbicacion @get ='$get'");
        $proceso = odbc_exec($odbc, $sql); // ejecuto la db 
//-----------------------Resulato de la ejecucion--------------------------\\
        $nombre = odbc_result($proceso, "Ubicacion");
        $descripcion = odbc_result($proceso, "Descripcion");
        $id = odbc_result($proceso, "id");
//-----------------------------Consulta-------------------------------------\\
?>
<form class="form-horizontal" method="post" id="UpdateUbicacio" action="ujap.php?vista=UpdateUbicacion" role="form">
<div class="row">
	<div class="col-md-12">
	<h1>Editar Ubicacion<b> <? echo $nombre;?></b></h1>
  <h5>Codigo de la Ubicacion<b> <? echo $id?></b></h5>
	<br>
		<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre de la Ubicacion*</label>
    <div class="col-md-6">
    <input type="hidden" name="id" value=" <? echo $id?>">

      <input type="text" name="Ubicacion" required class="form-control" id="Ubicacion" placeholder=<? echo $nombre;?>>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripcion de la Ubicacion*</label>
     <div class="col-md-6">
      <textarea name="Descripcion" class="form-control" required  id="Descripcion" placeholder= <? echo $descripcion ?>><? echo $descripcion ?></textarea>
    </div>
  </div>


  <p class="alert alert-info">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-warning">Modificar Ubicacion</button>
      
    </div>
  
  </div>

</form>
	</div>
</div>