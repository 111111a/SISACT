<?php 
// ACCION DE REUBICAR ACTIVOS
    
    //BASE DE DATOS
    include "sistema/controlador/basedatos/conn.php";

    //ESTA CONSULTA HACE, UN SELECT IDActivo, IDUbicacion, Activo from ACTIVOS_FIJOS

        $sql = sprintf("exec Consulta3");
        $proceso = odbc_exec($odbc, $sql); // ejecuto la db 


    //LLAMO UBICACION Y LO COLOCO COMO SELECT

        $Ubicaciones = sprintf("exec ListadoUbicaciones");
        $Ubicacionesexec= odbc_exec($odbc, $Ubicaciones);
////////////////////////////////////////////////////////////////////////////////RESULTADOS:
?>
<form class="form-horizontal" method="post" id="UpdateRUbicacion" action="ujap.php?vista=UpdateRUbicacion" role="form">
<div class="row">
	<div class="col-md-12">
	 <h1>Reubicar Activo</h1>  
	 <br>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Seleccionar Activo*</label>
        <div class="col-md-6">
          <select name="IDActivo" id="IDActivo" class="form-control" onchange="IDA(this.value)">
                <option value="">Elige un activo</option>
              <?php    while (odbc_fetch_row($proceso)) { ?>
             <option value="<?php echo odbc_result($proceso,"IDActivo");?>"><?php echo odbc_result($proceso,"Activo");?>
              </option>
            <?php }?>
          </select>
        <div id="txtHint"><b>Selecicionar un activo</b></div>
      </div>
    </div>

  </div>
  <label for="inputEmail1" class="col-lg-2 control-label">Reubicar Activo en la ubicacion*</label>
    <div class="col-md-6">
        <select name="IDUbicacion" id="IDUbicacion" class="form-control">
           <option value="">Elija Ubicacion</option> 
              <?php    while(odbc_fetch_row($Ubicacionesexec)) { ?>
               <option value="<?php echo odbc_result($Ubicacionesexec,"id");?>"><?php echo odbc_result($Ubicacionesexec,"Ubicacion");?>
              </option>
            <?php }?>
        </select>
    </div>
 <br> 
 </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha de Incorporacion*</label>
    <div class="col-md-6">
      <div class='input-group date' id='datetimepicker1'>
       <input type='date' class="form-control" name="fecha_I" id='fecha_I' required/>
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
           </span>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Motivo de reubicacion</label>
     <div class="col-md-6">
      <textarea name="Descripcion" class="form-control" id="Descripcion" placeholder= <? echo $descripcion ?>><? echo $descripcion ?></textarea>
    </div>
  </div>


  <p class="alert alert-info">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-warning">Reubicar Activo</button>
      </div>
 </div>
</form>
	