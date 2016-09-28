<div class="row">
    <div class="col-md-12">
	<h1>Nueva Ubicacion</h1>
	<br>
        <form class="form-horizontal" method="post" id="InsertUbicacion" action="ujap.php?vista=InsertUbicacion" role="form">
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Nombre de la Ubicacion*</label>
                <div class="col-md-6">
                    <input type="text" name="Ubicacion" class="form-control" id="Ubicacion" placeholder="Nombre del Ubicacion" maxlength="16" required/>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Descripcion de la Ubicacion*</label>
                <div class="col-md-6">
                    <textarea name="Descripcion" class="form-control" id="Descripcion" placeholder="Descripcion del Ubicacion" required ></textarea>
                </div>
            </div>
            <p class="alert alert-danger">* Campos obligatorios</p>
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-success">Agregar Ubicacion <i class="glyphicon glyphicon-ok"></i></button>
                </div>
            </div>
        </form>
	</div>
</div>