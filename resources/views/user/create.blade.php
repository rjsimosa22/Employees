@extends('layouts.rgindex')

@section('content')
 <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Registrar usuario</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-car"></i>Usuario</a></li>
            <li class="active">Registrar</li>
        </ol>
    </section>    

    <section class="content">
            <div class="row">
                <div class="col-md-12">
                    @include('common.notification')
                    <div class="box box-primary">
                        <div class="box-header with-border"><h3 class="box-title">Datos Generales Del Usuario</h3></div>
                        <div>
                            <input type="hidden" name="Userids" id="Userids">
                            <div class="box-body">
                                <div class="col-md-12">
                                    <div class="form-group col-md-4">
                                        <label for="placa">Nombre<label style="color:red">*</label></label>
                                        <input type="text" class="form-control mayusc" name="Usernames" id="Usernames" placeholder="Ingresar nombre" required>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="placa">Usuario<label style="color:red">*</label></label>
                                        <input type="text" class="form-control mayusc" name="Userusers" id="Userusers" placeholder="Ingresar usuario" required>
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label for="categoria">Perfil<label style="color:red">*</label></label>
                                        <select class="form-control mayusc" name="Userprofiles" id="Userprofiles" required>
                                            @foreach($privileges as $profile)
                                                <option value="{{ $profile->id }}">{{ $profile->description }}</option>
                                            @endforeach    
                                        </select>   
                                    </div>
                                </div>  
                                    
                                <div class="col-md-12">
                                    <div class="form-group col-md-4">
                                        <label for="color">Contraseña<label style="color:red">*</label></label>
                                        <input type="password" class="form-control mayusc" name="Userpasswords" id="Userpasswords" placeholder="Ingresar Contraseña" required>
                                    </div>
            
                                    <div class="form-group col-md-4">
                                        <label for="color">Confirmar Contraseña<label style="color:red">*</label></label>
                                        <input type="password" class="form-control mayusc" name="Userpassword2s" id="Userpassword2s" placeholder="Confirmar Contraseña" required>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="categoria">Estatus<label style="color:red">*</label></label>
                                        <select class="form-control mayusc" name="Userstatuss" id="Userstatuss" required>
                                            @foreach($status as $statu)
                                                <option value="{{ $statu->id }}">{{ $statu->description }}</option>
                                            @endforeach 
                                                    
                                        </select>   
                                    </div>
                                </div>
                            </div>
                            
                            <div class="box-footer">
                                <label style="color:red">(*) Todos los campos son requeridos.</label>
                              
                                <center>
                                    <button type="submit" class="btn btn-primary" id='btn-user' value="create" onclick="javascript:void(0);">Guardar</button>
                                    <button type="reset" class="btn btn-default" onclick="getClearUsersNew()">Cancelar</button>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
