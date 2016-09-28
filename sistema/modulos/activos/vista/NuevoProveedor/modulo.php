<div class="row">
	<div class="col-md-12">
	<h1>Nuevo Proveedor</h1>
	<br>
		<form class="form-horizontal" method="post" id="InsertProveedor" action="ujap.php?vista=InsertProveedor" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre del Proveedor*</label>
    <div class="col-md-6">
      <input type="text" name="Proveedor" class="form-control" id="Proveedor" placeholder="Nombre del Proveedor" maxlength="16" required/>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripcion del Proveedor*</label>
    < <div class="col-md-6">
      <textarea name="Descripcion" class="form-control" id="Descripcion" placeholder="Descripcion del Proveedor" required/></textarea>
    </div>
  </div>


  <p class="alert alert-danger">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-success">Agregar Proveedor <i class="glyphicon glyphicon-ok"></i></button>
    </div>
  </div>
</form>
	</div>
</div>