<?php 
//-----------------------------Consulta-------------------------------------\\

        include "sistema/controlador/basedatos/conn.php";
        if($_GET)
        {
          $get = isset( $_GET['id'] ) ? $_GET['id'] : '';
       }  
        
        //$get = $_GET['id'];
        $sql = sprintf("exec detallesproveedor @get ='$get'");
        $proceso = odbc_exec($odbc, $sql); // ejecuto la db 
//-----------------------Resulato de la ejecucion--------------------------\\
        $proveedornombre = odbc_result($proceso, "Proveedor");
        $proveedordescripcion = odbc_result($proceso, "Descripcion");
        $proveedorid = odbc_result($proceso, "id");
//-----------------------------Consulta-------------------------------------\\
?>
<form class="form-horizontal" method="post" id="UpdateProveedor" action="ujap.php?vista=UpdateProveedor" role="form">
<div class="row">
	<div class="col-md-12">
	<h1>Editar Proveedor<b> <? echo $proveedornombre;?></b></h1>
  <h5>Codigo de Proveedor<b> <? echo $proveedorid?></b></h5>
	<br>
		


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre del Proveedor*</label>
    <div class="col-md-6">
    <input type="hidden" name="id" value=" <? echo $proveedorid?>">

      <input type="text" name="Proveedor" class="form-control" required  id="Proveedor" placeholder=<? echo $proveedornombre;?> values=<? echo $proveedornombre;?>>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" required  class="col-lg-2 control-label">Descripcion del Proveedor*</label>
     <div class="col-md-6">
      <textarea name="Descripcion" class="form-control" id="Descripcion" placeholder= <? echo $proveedordescripcion ?>><? echo $proveedordescripcion ?></textarea>
    </div>
  </div>


  <p class="alert alert-info">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-warning">Modificar Proveedor</button>
      <td>
        <a href="ujap.php?vista=DetalleProveedor&id=<?php echo odbc_result($proceso,"id")?>">
        <button type="button" class="btn btn-primary"></i> Detalles del proveedor
        </button>
      </td>
    </div>
  
  </div>

</form>
	</div>
</div>