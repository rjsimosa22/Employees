@include('client.search')

<div id="editVehicle" class="modal" style="max-width: 700px;margin-top:50px;">
    <section class="content-header">
        <h1>Editar vehículo</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-car"></i>Vehículos</a></li>
            <li class="active">Editar</li>
        </ol>
    </section>    
    
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border"><h3 class="box-title">Datos Generales Del Vehículo</h3></div>
                    <div>
                        <input type="hidden" name="Vehid" id="Vehid">
                        <input type="hidden" name="Clientid" id="Clientid">
                        <input type="hidden" name="ClientidNew" id="ClientidNew">
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="form-group col-md-4">
                                    <label for="placa">Placa</label>
                                    <input type="text" class="form-control mayusc" name="Vehplate" id="Vehplate" placeholder="Ingresar placa" required>
                                </div>
    
                                <div class="form-group col-md-4">
                                    <label for="categoria">Categoría</label>
                                    <select class="form-control mayusc" name="Vehcategory" id="Vehcategory" required></select>       
                                </div>
    
                                <div class="form-group col-md-4">
                                    <label for="marca">Marca</label>
                                    <select class="form-control mayusc" name="Vehmark" id="Vehmark" required></select>   
                                </div>
                            </div>  
                                
                            <div class="col-md-12">
                                <div class="form-group col-md-4">
                                    <label for="modelo">Modelo</label>
                                    <select class="form-control mayusc" name="Vehmodel" id="Vehmodel" required></select>  
                                </div>
        
                                <div class="form-group col-md-4">
                                    <label for="color">Color</label>
                                    <input type="text" class="form-control mayusc" name="Vehcolour" id="Vehcolour" placeholder="Ingresar color" required>
                                </div>
        
                                <div class="form-group col-md-4">
                                    <label for="ano">Año</label>
                                    <input type="text" class="form-control mayusc" name="Vehyear" id="Vehyear" placeholder="Ingresar año" required>
                                </div>
                            </div>
    
                            <div class="col-md-12">
                                <div class="form-group col-md-4">
                                    <label for="motor">Nro. Motor</label>
                                    <input type="text" class="form-control mayusc" name="Vehmotor" id="Vehmotor" placeholder="Ingresar nro. motor" required>
                                </div>
            
                                <div class="form-group col-md-4">
                                    <label for="serie">Nro. Serie</label>
                                    <input type="text" class="form-control mayusc" name="Vehserie" id="Vehserie" placeholder="Ingresar nro. serie" required>
                                </div>
    
                                <div class="form-group col-md-4">
                                    <label for="estatus">Estatus</label>
                                    <select class="form-control mayusc" name="Vehstatus" id="Vehstatus" required>
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>    
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group col-md-12">
                                    <label for="observacion">Observación</label>
                                    <textarea name="Vehobservations" id="Vehobservations" class="form-control mayusc" rows="4" cols="40" placeholder="Ingresar Observación"></textarea>
                                </div>   
                            </div>
                        </div>
    
                        <div class="box-header with-border">
                            <div class="col-md-12">
                                <div class="form-group col-md-10">
                                    <h3 class="box-title">Datos Del Cliente</h3> 
                                </div>    
                                    
                                <div class="form-group col-md-2" align='right'>
                                    <a href="#searchClient" rel="modal:open" id="view-edit" data-toggle="tooltip" title="Buscar" class="search btn btn-success"><span class="fa fa-search"></span></a>
                                    <!--a href="javascript:void(0);" id="delete-client" data-toggle="tooltip" title="Eliminar" data-id="" class="delete btn btn-success"><span class="fa fa-trash-o"></span></a-->
                                </div> 
                            </div>    
                        </div>

                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="form-group col-md-4">
                                    <label for="estatus">Tipo de Documento</label>
                                    <select class="form-control mayusc" id="Clienttype">
                                        <option value="1">D.N.I</option>
                                        <option value="2">RUC</option>
                                    </select>    
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="DNI">Nro. de Documento</label>
                                    <input type="text" class="form-control mayusc" id="Clientdocument" placeholder="Ingresar documento" required>
                                </div>
           
                                <div class="form-group col-md-4">
                                    <label for="Clientname">Nombre(s)</label>
                                    <input type="text" class="form-control mayusc" id="Clientname" placeholder="Ingresar nombre" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="box-footer">
                            <label style="color:red">(*) Todos los campos son requeridos.</label>
                              
                            <center>
                                <button type="submit" class="btn btn-primary" id='btn-vehicle' value="create" onclick="javascript:void(0);">Editar</button>
                                <button type="reset" class="btn btn-default" onclick="getClearVehicles()">Cerrar</button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>