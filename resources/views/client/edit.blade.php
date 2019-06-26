<div id="editClient" class="modal" style="max-width: 700px;margin-top:50px;">
    <section class="content-header">
        <h1>Editar cliente</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-car"></i>clientes</a></li>
            <li class="active">Editar</li>
        </ol>
    </section>    
    
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border"><h3 class="box-title">Datos Generales Del Cliente</h3></div>
                    <div>
                        <input type="hidden" name="Clientsid" id="Clientsid">
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="form-group col-md-4">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control mayusc" name="Clientname" id="Clientname" placeholder="Ingresar nombre" required>
                                </div>
    
                                <div class="form-group col-md-4">
                                    <label for="tipo">Tipo</label>
                                    <select class="form-control" name="Clienttype" id="Clienttype" required>
                                        <option value="1">D.N.I</option>
                                        <option value="2">RUC</option>
                                    </select>    
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="documento">Documento</label>
                                    <input type="text" class="form-control mayusc" name="Clientdocument" id="Clientdocument" placeholder="Ingresar documento" required>
                                </div>
                            </div>  
                                
                            <div class="col-md-12">
                                <div class="form-group col-md-12">
                                    <label for="direccion">Dirección</label>
                                    <textarea name="Clientaddress" id="Clientaddress" class="form-control mayusc" rows="4" cols="40" placeholder="Ingresar dirección"></textarea>
                                </div>   
                            </div>

                            <div class="col-md-12">
                                <div class="form-group col-md-4">
                                    <label for="teléfono">Teléfono</label>
                                    <input type="text" class="form-control mayusc" name="Clientphone" id="Clientphone" placeholder="Ingresar teléfono" required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control mayusc" name="Clientemail" id="Clientemail" placeholder="Ingresar email">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="contacto">Contacto</label>
                                    <input type="text" class="form-control mayusc" name="Clientcontact" id="Clientcontact" placeholder="Ingresar email">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group col-md-4">
                                    <label for="nacimiento">Fecha de Nacimiento</label>
                                    <input type="text" class="form-control mayusc" name="Clientbirthdate" id="Clientbirthdate" placeholder="Ingresar fecha de nacimiento">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="aniversario">Fecha de Aniversario</label>
                                    <input type="text" class="form-control mayusc" name="Clientanniversary" id="Clientanniversary" placeholder="Ingresar fecha de aniversario">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="estatus">Estatus</label>
                                    <select class="form-control mayusc" name="Clientstatus" id="Clientstatus">
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>    
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group col-md-12">
                                    <label for="observacion">Observación</label>
                                    <textarea name="Clientobservations" id="Clientobservations" class="form-control mayusc" rows="4" cols="40" placeholder="Ingresar Observación"></textarea>
                                </div>   
                            </div>
                        </div>

                        <div class="box-footer">
                            <label style="color:red">(*) Todos los campos son requeridos.</label>
                              
                            <center>
                                <button type="submit" class="btn btn-primary" id='btn-client' value="create" onclick="javascript:void(0);">Editar</button>
                                <button type="reset" class="btn btn-default" onclick="getClearClient()">Cerrar</button>
                            </center>
                        </div>                          
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>