<div id="editMechanics" class="modal" style="max-width: 700px;margin-top:50px;">
        <section class="content-header">
            <h1><text id="tittleMechanics"></text> Mecánico</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-car"></i>Mecánico</a></li>
                <li class="active"><text id="tittleMechanicsHr"></text></li>
            </ol>
        </section>   
        
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border"><h3 class="box-title">Datos Generales De Mecánico</h3></div>
                        <div>
                            <input type="hidden" name="Mechanicsid" id="Mechanicsid">
                            <div class="box-body">
                                <div class="col-md-12">
                                    <div class="form-group col-md-4">
                                        <label for="placa">Nombre<label style="color:red">*</label></label>
                                        <input type="text" class="form-control mayusc" name="Mechanicsdescription" id="Mechanicsdescription" placeholder="Ingresar nombre" required>
                                    </div>
        
                                    <div class="form-group col-md-4">
                                        <label for="placa">Abreviación<label style="color:red">*</label></label>
                                        <input type="text" class="form-control mayusc" name="Mechanicsabreviation" id="Mechanicsabreviation" placeholder="Ingresar Abreviación" required>
                                    </div>
                                            
                                    <div class="form-group col-md-4">
                                        <label for="categoria">Comisión<label style="color:red">*</label></label>
                                        <select class="form-control mayusc" name="Mechanicsidcommission" id="Mechanicsidcommission" required></select>   
                                    </div>
                                </div> 
                                
                                <div class="col-md-12">
                                    <div class="form-group col-md-4">
                                        <label for="categoria">Estatus<label style="color:red">*</label></label>
                                        <select class="form-control mayusc" name="Mechanicsstatus" id="Mechanicsstatus" required></select>   
                                    </div>
                                </div> 
                            </div>
          
                            <div class="box-footer">
                                <label style="color:red">(*) Todos los campos son requeridos.</label>
                                  
                                <center>
                                    <button type="submit" class="btn btn-primary" id='btn-mechanics' value="edit" onclick="javascript:void(0);">Editar</button>
                                    <button type="reset" class="btn btn-default" onclick="getClearMechanics()">Cerrar</button>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>