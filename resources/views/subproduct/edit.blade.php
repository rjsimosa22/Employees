<div id="editSubProduct" class="modal" style="max-width: 700px;margin-top:50px;">
    <section class="content-header">
        <h1><text id="tittleAdvisors"></text> Asesores de Servicio</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-car"></i>Asesores de Servicio</a></li>
            <li class="active"><text id="tittleAdvisorsHr"></text></li>
        </ol>
    </section>   
    
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border"><h3 class="box-title">Datos Generales Asesores De Servicio</h3></div>
                    <div>
                        <input type="hidden" name="SubProductid" id="SubProductid">
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="form-group col-md-4">
                                    <label for="categoria">Productos<label style="color:red">*</label></label>
                                    <select class="form-control mayusc" name="SubProductidproduct" id="SubProductidproduct" required></select>   
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label for="placa">Sub Producto<label style="color:red">*</label></label>
                                    <input type="text" class="form-control mayusc" name="SubProductdescription" id="SubProductdescription" placeholder="Ingresar sub producto" required>
                                </div>
    
                                <div class="form-group col-md-4">
                                    <label for="placa">Abreviación<label style="color:red">*</label></label>
                                    <input type="text" class="form-control mayusc" name="SubProductabreviation" id="SubProductabreviation" placeholder="Ingresar Abreviación" required>
                                </div>
                            </div> 
                            
                            <div class="col-md-12">
                                <div class="form-group col-md-4">
                                    <label for="categoria">Estatus<label style="color:red">*</label></label>
                                    <select class="form-control mayusc" name="SubProductstatus" id="SubProductstatus" required></select>   
                                </div>
                            </div> 
                        </div>
      
                        <div class="box-footer">
                            <label style="color:red">(*) Todos los campos son requeridos.</label>
                              
                            <center>
                                <button type="submit" class="btn btn-primary" id='btn-subproduct' value="edit" onclick="javascript:void(0);">Editar</button>
                                <button type="reset" class="btn btn-default" onclick="getClearSubProduct()">Cerrar</button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>