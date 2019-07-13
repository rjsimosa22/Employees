<div id="editUser" class="modal" style="max-width: 700px;margin-top:50px;">
    <section class="content-header">
        <h1>Editar usuario</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-car"></i>Usuario</a></li>
            <li class="active">Editar</li>
        </ol>
    </section>    
    
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border"><h3 class="box-title">Datos Generales Del Usuario</h3></div>
                    <div>
                        <input type="hidden" name="Userid" id="Userid">
                        <input type="hidden" name="UserpasswordAct" id="UserpasswordAct">
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="form-group col-md-4">
                                    <label for="placa">Nombre<label style="color:red">*</label></label>
                                    <input type="text" class="form-control mayusc" name="Username" id="Username" placeholder="Ingresar nombre" required>
                                </div>
    
                                <div class="form-group col-md-4">
                                    <label for="placa">Usuario<label style="color:red">*</label></label>
                                    <input type="text" class="form-control mayusc" name="Useruser" id="Useruser" placeholder="Ingresar usuario" required>
                                </div>
                                        
                                <div class="form-group col-md-4">
                                    <label for="categoria">Perfil<label style="color:red">*</label></label>
                                    <select class="form-control mayusc" name="Userprofile" id="Userprofile" required></select>   
                                </div>
                            </div>  
                                
                            <div class="col-md-12">
                                <div class="form-group col-md-4">
                                    <label for="color">Cambiar Contraseña<label style="color:red">&nbsp;</label></label>
                                    <input type="password" class="form-control mayusc" name="Userpassword" id="Userpassword" placeholder="Ingresar Contraseña">
                                </div>
                
                                <div class="form-group col-md-4">
                                    <label for="color">Confirmar Contraseña<label style="color:red">&nbsp;</label></label>
                                    <input type="password" class="form-control mayusc" name="Userpassword2" id="Userpassword2" placeholder="Confirmar Contraseña">
                                </div>
    
                                <div class="form-group col-md-4">
                                    <label for="status">Estatus<label style="color:red">*</label></label>
                                    <select class="form-control mayusc" name="Userstatus" id="Userstatus" required></select>   
                                </div>
                            </div>    
                        </div>
      
                        <div class="box-footer">
                            <label style="color:red">(*) Todos los campos son requeridos.</label>
                              
                            <center>
                                <button type="submit" class="btn btn-primary" id='btn-user' value="edit" onclick="javascript:void(0);">Editar</button>
                                <button type="reset" class="btn btn-default" onclick="getClearUsers()">Cerrar</button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>