<?php 
//-----------------------------Consulta-------------------------------------\\

        include "sistema/controlador/basedatos/conn.php";
        if($_GET)
        {
          $get = isset( $_GET['id'] ) ? $_GET['id'] : '';
       }  
        
        //$get = $_GET['id'];
        $sql = sprintf("exec DetalleActivos @get ='$get'");
        $proceso = odbc_exec($odbc, $sql); // ejecuto la db 
        $Proveedor = sprintf("exec ListarProveedoresActivos");
        $Proveedorexec= odbc_exec($odbc, $Proveedor);
//-----------------------Resulato de la ejecucion--------------------------\\
        $activonombre = odbc_result($proceso, "Activo");
        $activodescripcion = odbc_result($proceso, "Descripcion");
        $activoid = odbc_result($proceso, "IDActivo");
        $serial = odbc_result($proceso, "Serial");
        $FechaA = odbc_result($proceso, "Fecha_Adquisicion");
        $Referencia = odbc_result($proceso, "Referencia");
        $Costo_adquisicion = odbc_result($proceso, "Costo_adquisicion");
        $Vida_util = odbc_result($proceso, "Vida_util");
        $Saldo_a_depreciar = odbc_result($proceso, "Saldo_a_depreciar");
        $Ultimo_periodo = odbc_result($proceso, "Ultimo_periodo");
        $Periodo_saldo_cero = odbc_result($proceso, "Periodo_saldo_cero");
        $Fecha_incorporacion = odbc_result($proceso, "Fecha_incorporacion");
        $Fecha_desincorporacion = odbc_result($proceso, "Fecha_desincorporacion");
        $SituacionD = odbc_result($proceso, "Situacion");
        $proveedor = odbc_result($proceso, "IDProveedor");
        $IDUbicacion = odbc_result($proceso, "IDUbicacion");  
//-----------------------------Consulta-------------------------------------\\
?>
<form class="form-horizontal" method="post" id="UpdateActivo" action="ujap.php?vista=UpdateActivo" role="form">
<div class="row">
	<div class="col-md-12">
	<h1>Editar activo<b> <? echo $activonombre;?></b></h1>
  <h5>Codigo de activo<b> <? echo $activoid?></b></h5>
	<br>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre del activo*</label>
    <div class="col-md-6">
    <input type="text" name="activo" class="form-control" id="activo" placeholder=<? echo $activonombre;?> values=<? echo $activonombre;?> required>
    </div>
  </div>
  <input type="hidden" name="id" value="<? echo $activoid?>">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripcion del activo*</label>
     <div class="col-md-6">
      <textarea name="Descripcion" class="form-control" id="Descripcion" placeholder= <? echo $activodescripcion ?>><? echo $activodescripcion ?></textarea>
    </div>
  </div>
   <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Serial del activo*</label>
    <div class="col-md-6">
    <input type="hidden" name="id" value=" <? echo $serial?>">
      <input type="text"  name="serial" class="form-control" id="serial" placeholder=<? echo $serial;?> values=<? echo $serial;?>>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha de Adquisicion*</label>
    <div class="col-md-6">
      <div class='input-group date' id='datetimepicker1'>
       <input type="hidden" name="id" >
      <input type="text"  class="form-control" placeholder=<? echo $FechaA;?> values=<? echo $FechaA ?> disabled>
         <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
           </span>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Referencia*</label>
    <div class="col-md-6">
      <input type="text" name="Referencia" class="form-control"  id="Referencia" placeholder="<? echo $Referencia;?>" maxlength="10"/>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Costo de Adquisicion*</label>
      <div class="col-md-6">
        <div class='input-group date' id='datetimepicker1'>
          <input type="number" name="costo1" class="form-control"  id="costo1" placeholder="<? echo $Costo_adquisicion;?>" disabled required/>
            <span class="input-group-addon">BSF</span>
        </div>
      </div>
  </div> 
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Vida Util*</label>
      <div class="col-md-6">
        <input type="number" name="VidaU" class="form-control"  disabled id="VidaU" placeholder="<? echo $Vida_util;?>" required/>
      </div>
  </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-2 control-label">Saldo a Depreciar*</label>
      <div class="col-md-6">
        <div class='input-group date' id='datetimepicker1'>
          <input type="number" name="Depreciar" class="form-control" disabled id="Depreciar" placeholder="<? echo$Saldo_a_depreciar ?>" required/>
          <span class="input-group-addon">BSF</span>
        </div>
      </div>
    </div>

   <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha de Incoroporacion*</label>
    <div class="col-md-6">
      <div class='input-group date' id='datetimepicker1'>
       <input type="hidden" name="id">
      <input type="text"  name="Incroporcaion" class="form-control" id="incorporacion" placeholder=<? echo $Fecha_incorporacion;?> values=<? echo $Fecha_incorporacion ?> disabled>
         <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
           </span>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha de desincoroporacion*</label>
    <div class="col-md-6">
      <div class='input-group date' id='datetimepicker1'>
       <input type="hidden" name="id">
      <input type="text"  name="desIncroporcaion" class="form-control" placeholder=<? echo $Fecha_desincorporacion;?> disabled>
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
           <option value="<? echo $proveedor?>">El mismo proveedor</option> 
              <?php    while(odbc_fetch_row($Proveedorexec)) { ?>
               <option value="<?php echo odbc_result($Proveedorexec,"id");?>"><?php echo odbc_result($Proveedorexec,"Proveedor");?>
              </option>
            <?php }?>
        </select>
    </div>
  </div>


  </div>

  <p class="alert alert-danger">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-warning">Modificar activo</button>
      <td>
        <a href="ujap.php?vista=DetalleActivo&id=<?php echo odbc_result($proceso,"IDActivo")?>">
        <button type="button" class="btn btn-primary"></i> Detalles del proveedor
        </button>
      </td>
    </div>
  
  </div>

</form>
	</div>
</div>