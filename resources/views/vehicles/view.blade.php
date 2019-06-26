<div id="viewVehicle" class="modal" style="max-width: 700px;margin-top:50px;">
        <section class="content-header">
            <h1>Visualizar vehículo</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-car"></i>Vehículos</a></li>
                <li class="active">Visualizar</li>
            </ol>
        </section>    
        
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border"><h3 class="box-title">Datos Generales Del Vehículo</h3></div>
                        <div>
                            <input type="hidden" name="Vehid" id="Vehid">
                            <div class="box-body">
                                <div class="col-md-12">
                                    <div class="form-group col-md-4">
                                        <label for="placa">Placa</label>
                                        <input type="text" class="form-control" name="Vehplate" id="Vehplate" placeholder="Ingresar placa">
                                    </div>
        
                                    <div class="form-group col-md-4">
                                        <label for="categoria">Categoría</label>
                                        <input type="text" class="form-control" name='Vehcategory' id="Vehcategory" placeholder="Ingresar categoría">
                                    </div>
        
                                    <div class="form-group col-md-4">
                                        <label for="marca">Marca</label>
                                        <input type="text" class="form-control" name="Vehmark" id="Vehmark" placeholder="Ingresar marca">
                                    </div>
                                </div>  
                                    
                                <div class="col-md-12">
                                    <div class="form-group col-md-4">
                                        <label for="modelo">Modelo</label>
                                        <input type="text" class="form-control" name="Vehmodel" id="Vehmodel" placeholder="Ingresar modelo">
                                    </div>
            
                                    <div class="form-group col-md-4">
                                        <label for="color">Color</label>
                                        <input type="text" class="form-control" name="Vehcolour" id="Vehcolour" placeholder="Ingresar color">
                                    </div>
            
                                    <div class="form-group col-md-4">
                                        <label for="ano">Año</label>
                                        <input type="text" class="form-control" name="Vehyear" id="Vehyear" placeholder="Ingresar año">
                                    </div>
                                </div>
        
                                <div class="col-md-12">
                                    <div class="form-group col-md-4">
                                        <label for="motor">Nro. Motor</label>
                                        <input type="text" class="form-control" name="Vehmotor" id="Vehmotor" placeholder="Ingresar nro. motor">
                                    </div>
                
                                    <div class="form-group col-md-4">
                                        <label for="serie">Nro. Serie</label>
                                        <input type="text" class="form-control" name="Vehserie" id="Vehserie" placeholder="Ingresar nro. serie">
                                    </div>
        
                                    <div class="form-group col-md-4">
                                        <label for="estatus">Estatus</label>
                                        <select class="form-control" name="Vehstatus" id="Vehstatus">
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>    
                                    </div>
                                </div>
                            </div>
        
                            <div class="box-header with-border"><h3 class="box-title">Datos Del Propietario</h3></div>
                            <div class="box-body">
                                <div class="col-md-12">
                                    <div class="form-group col-md-4">
                                        <label for="estatus">Tipo de Documento</label>
                                        <select class="form-control" id="Clienttype">
                                            <option value="1">D.N.I</option>
                                            <option value="2">RUC</option>
                                        </select>    
                                    </div>
    
                                    <div class="form-group col-md-4">
                                        <label for="DNI">Nro. de Documento</label>
                                        <input type="text" class="form-control" id="Clientdocument" placeholder="Ingresar documento">
                                    </div>
               
                                    <div class="form-group col-md-4">
                                        <label for="Clientname">Nombre(s)</label>
                                        <input type="text" class="form-control" id="Clientname" placeholder="Ingresar nombre">
                                    </div>
                                </div>
                            </div>
                                                      
                            <center>
                                <div class="box-footer">
                                    <button type="reset" class="btn btn-default" onclick="getClearVehicles()">Cerrar</button>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>