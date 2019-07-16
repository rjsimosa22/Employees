<div id="editMovementsCash" class="modal" style="max-width: 700px;margin-top:50px;">
        <section class="content-header">
            <h1><text id="tittleMovementsCash"></text> Movimientos de Caja</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-car"></i>Movimientos de Caja</a></li>
                <li class="active"><text id="tittleMovementsCashHr"></text></li>
            </ol>
        </section>   
        
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border"><h3 class="box-title">Datos Generales De Moneda</h3></div>
                        <div>
                            <input type="hidden" name="MovementsCashid" id="MovementsCashid">
                            <div class="box-body">
                                <div class="col-md-12">
                                    <div class="form-group col-md-4">
                                        <label for="placa">Nombre<label style="color:red">*</label></label>
                                        <input type="text" class="form-control mayusc" name="MovementsCashdescription" id="MovementsCashdescription" placeholder="Ingresar nombre" required>
                                    </div>
        
                                    <div class="form-group col-md-4">
                                        <label for="placa">Abreviación<label style="color:red">*</label></label>
                                        <input type="text" class="form-control mayusc" name="MovementsCashabreviation" id="MovementsCashabreviation" placeholder="Ingresar Abreviación" required>
                                    </div>
                                            
                                    <div class="form-group col-md-4">
                                        <label for="placa">Tipo de Movimiento <label style="color:red">*</label></label>
                                        <select class="form-control mayusc" name="MovementsCashtype" id="MovementsCashtype" required></select>   
                                    </div>
                                </div> 
                                
                                <div class="col-md-12">
                                    <div class="form-group col-md-4">
                                        <label for="categoria">Estatus<label style="color:red">*</label></label>
                                        <select class="form-control mayusc" name="MovementsCashstatus" id="MovementsCashstatus" required></select>   
                                    </div>
                                </div> 
                            </div>
          
                            <div class="box-footer">
                                <label style="color:red">(*) Todos los campos son requeridos.</label>
                                  
                                <center>
                                    <button type="submit" class="btn btn-primary" id='btn-movementscash' value="edit" onclick="javascript:void(0);">Editar</button>
                                    <button type="reset" class="btn btn-default" onclick="getClearMovementsCash()">Cerrar</button>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>