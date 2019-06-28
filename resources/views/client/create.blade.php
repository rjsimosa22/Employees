@extends('layouts.rgindex')

@section('content')
 <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Registrar cliente</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-car"></i>clientes</a></li>
            <li class="active">Registrar</li>
        </ol>
    </section>    

    <section class="content">
            <div class="row">
                <div class="col-md-12">
                    @include('common.notification')
                    <div class="box box-primary">
                            <div class="box-header with-border"><h3 class="box-title">Datos Generales Del Cliente</h3></div>
                            <div>
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-4">
                                            <label for="nombre">Nombre<label style="color:red">*</label></label>
                                            <input type="text" class="form-control mayusc" name="Clientnames" id="Clientnames" placeholder="Ingresar nombre" required>
                                        </div>
            
                                        <div class="form-group col-md-4">
                                            <label for="tipo">Tipo<label style="color:red">&nbsp;</label></label>
                                            <select class="form-control" name="Clienttypes" id="Clienttypes">
                                                <option value="1">D.N.I</option>
                                                <option value="2">RUC</option>
                                            </select>    
                                        </div>
        
                                        <div class="form-group col-md-4">
                                            <label for="documento">Documento<label style="color:red">&nbsp;</label></label>
                                            <input type="text" class="form-control mayusc" name="Clientdocuments" id="Clientdocuments" placeholder="Ingresar documento">
                                        </div>
                                    </div>  
                                        
                                    <div class="col-md-12">
                                        <div class="form-group col-md-12">
                                            <label for="direccion">Dirección</label>
                                            <textarea name="Clientaddresss" id="Clientaddresss" class="form-control mayusc" rows="4" cols="40" placeholder="Ingresar dirección"></textarea>
                                        </div>   
                                    </div>
        
                                    <div class="col-md-12">
                                        <div class="form-group col-md-4">
                                            <label for="teléfono">Teléfono<label style="color:red">*</label></label>
                                            <input type="text" class="form-control mayusc" name="Clientphones" id="Clientphones" placeholder="Ingresar teléfono" required>
                                        </div>
        
                                        <div class="form-group col-md-4">
                                            <label for="email">Email<label style="color:red">&nbsp;</label></label>
                                            <input type="text" class="form-control mayusc" name="Clientemails" id="Clientemails" placeholder="Ingresar email">
                                        </div>
        
                                        <div class="form-group col-md-4">
                                            <label for="contacto">Contacto<label style="color:red">&nbsp;</label></label>
                                            <input type="text" class="form-control mayusc" name="Clientcontacts" id="Clientcontacts" placeholder="Ingresar email">
                                        </div>
                                    </div>
        
                                    <div class="col-md-12">
                                        <div class="form-group col-md-4">
                                            <label for="nacimiento">Fecha de Nacimiento</label>
                                            <input type="text" class="form-control mayusc" name="Clientbirthdates" id="Clientbirthdates" placeholder="Ingresar fecha de nacimiento">
                                        </div>
        
                                        <div class="form-group col-md-4">
                                            <label for="aniversario">Fecha de Aniversario</label>
                                            <input type="text" class="form-control mayusc" name="Clientanniversarys" id="Clientanniversarys" placeholder="Ingresar fecha de aniversario">
                                        </div>
        
                                        <div class="form-group col-md-4">
                                            <label for="estatus">Estatus</label>
                                            <select class="form-control mayusc" name="Clientstatuss" id="Clientstatuss">
                                                <option value="1">Activo</option>
                                                <option value="0">Inactivo</option>
                                            </select>    
                                        </div>
                                    </div>
        
                                    <div class="col-md-12">
                                        <div class="form-group col-md-12">
                                            <label for="observacion">Observación</label>
                                            <textarea name="Clientobservationss" id="Clientobservationss" class="form-control mayusc" rows="4" cols="40" placeholder="Ingresar Observación"></textarea>
                                        </div>   
                                    </div>
                                </div>
        
                                <div class="box-footer">
                                    <label style="color:red">(*) Todos los campos son requeridos.</label>
                                      
                                    <center>
                                        <button type="submit" class="btn btn-primary" id='btn-client' value="create" onclick="javascript:void(0);">Guardar</button>
                                        <button type="reset" class="btn btn-default" onclick="getClearClientNew()">Cerrar</button>
                                    </center>
                                </div>                          
                            </div>
                        </div>
                </div>
            </div>
        </section>
@endsection
