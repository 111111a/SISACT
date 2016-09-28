<?php 
//ACCION DE REGISTRAR NUEVOS ACTIVOS
    
    //BASE DE DATOS
    include "sistema/controlador/basedatos/conn.php";

    //EJECUTO ESTA SENTENCIA PARA HACER UN SELECT DEL PROVEEDOR QUE VA HACER ASIGANDO
    $Proveedor = sprintf("exec ListarProveedoresActivos");
    $Proveedorexec= odbc_exec($odbc, $Proveedor);
    /*$Ubicaciones = sprintf("exec ListadoUbicaciones");
    $Ubicacionesexec= odbc_exec($odbc, $Ubicaciones);*/
?>
<div class="row">
  <div class="col-md-12">
  <h1>Nuevo Activo</h1>
  <br>
    <form class="form-horizontal" method="post" id="InsertActivos" action="ujap.php?vista=InsertActivos" role="form">
        <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Nombre del Activo*</label>
            <div class="col-md-6">
                <input type="text" name="Activo" class="form-control" id="Activo" placeholder="Nombre" maxlength="16" required/>
            </div>
        </div>
        
        
        <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Descripcion del activo*</label>
            <div class="col-md-6">
            <textarea name="Descripcion" class="form-control" id="Descripcion" placeholder="Descripcion del Proveedor" maxlength="120" required></textarea>
                <br> 
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Utiliza Serial*</label>
            <div class="col-md-6">
                <select name="checkbox" id="checkbox" class="form-control">
                   <option value="false">NO</option> 
                   <option value="true">SI</option>
                </select>
            </div>
        </div>
   
        
        <div class="form-group">
        <label for="inputEmail1" class="col-lg-2 control-label">Serial</label>
            <div class="col-md-6">
                <input type="text" name="Serial" class="form-control" id="Serial" placeholder="No es Necesario colocar Serial">
            </div>
        </div>
        
        
        <br> 
        <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Fecha de Adquisicion*</label>
                <div class="col-md-6">
                    <div class='input-group date' id='datetimepicker1'>
                        <input type='date' class="form-control" name="fecha_A" id='fechaInicial' placeholder="Ejemplo 19/07/2016" required/>
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
        </div>

        
        <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Referencia*</label>
            <div class="col-md-6">
                <input type="text" name="Referencia" class="form-control"  id="Referencia" placeholder="Referencia" maxlength="10"/>
            </div>
        </div>
        <br> 
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Costo de Adquisicion*</label>
    <div class="col-md-6">
    <div class='input-group date' id='datetimepicker1'>
      <input type="number" name="costo1" class="form-control"  id="costo1" placeholder="Costo del Activo" required/>
      <span class="input-group-addon">BSF</span>
           
           </div>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Vida Util*</label>
    <div class="col-md-6">
      <input type="number" max="999" min="1" name="VidaU" class="form-control"  id="VidaU" placeholder="Expresas en meses" required/>
    </div>
  </div>
  <br> 
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha de Incorporacion*</label>
    <div class="col-md-6">
      <div class='input-group date' id='datetimepicker1'>
       <input type='date' class="form-control" name="fecha_I" id='fechaFinal' placeholder="Ejemplo 19/07/2016" required/>
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
           </span>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha de Desicorporacion*</label>
    <div class="col-md-6">
      <div class='input-group date' id='datetimepicker1'>
       <input type='date' class="form-control" name="fecha_D" id='fecha_D' placeholder="Ejemplo 19/07/2016" required/>
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
           </span>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Proveedor*</label>
    <div class="col-md-6">
        <select name="IDProveedor" id="IDProveedor" class="form-control">
           <option value="1">No tiene Proveedor</option> 
              <?php    while(odbc_fetch_row($Proveedorexec)) { ?>
               <option value="<?php echo odbc_result($Proveedorexec,"id");?>"><?php echo odbc_result($Proveedorexec,"Proveedor");?>
              </option>
            <?php }?>
        </select>
    </div>
  </div>

  <p class="alert alert-info">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-success">Agregar Activos</button>
    </div>
  </div>
</form>
  </div>
</div>