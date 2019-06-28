@extends('layouts.rgindex')
@include('client.search')

@section('content')
 <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Registrar vehículo</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-car"></i>Vehículos</a></li>
            <li class="active">Registrar</li>
        </ol>
    </section>    

    <section class="content">
            <div class="row">
                <div class="col-md-12">
                    @include('common.notification')
                    <div class="box box-primary">
                        <div class="box-header with-border"><h3 class="box-title">Datos Generales Del Vehículo</h3></div>
                        <div>
                            <input type="hidden" name="Clientids" id="Clientids">
                            <div class="box-body">
                                <div class="col-md-12">
                                    <div class="form-group col-md-4">
                                        <label for="placa">Placa<label style="color:red">*</label></label>
                                        <input type="text" class="form-control mayusc" name="Vehplates" id="Vehplates" placeholder="Ingresar placa" required>
                                    </div>
        
                                    <div class="form-group col-md-4">
                                        <label for="categoria">Categoría<label style="color:red">*</label></label>
                                        <select class="form-control mayusc" name="Vehcategorys" id="Vehcategorys" required>
                                            <option value="">Seleccionar</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->description }}</option>
                                            @endforeach
                                        </select>   
                                    </div>
        
                                    <div class="form-group col-md-4">
                                        <label for="marca">Marca<label style="color:red">*</label></label>
                                        <select class="form-control mayusc" name="Vehmarks" id="Vehmarks" required onchange="models('Vehmodels','Vehmarks');">
                                            <option value="">Seleccionar</option>
                                            @foreach($marks as $mark)
                                                <option value="{{ $mark->id }}">{{ $mark->description }}</option>
                                            @endforeach
                                        </select>    
                                    </div>
                                </div>  
                                    
                                <div class="col-md-12">
                                    <div class="form-group col-md-4">
                                        <label for="modelo">Modelo<label style="color:red">*</label></label>
                                        <select class="form-control mayusc" name="Vehmodels" id="Vehmodels" required>    
                                            <option value="">Seleccionar</option>
                                         
                                        </select>    
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="color">Color<label style="color:red">*</label></label>
                                        <input type="text" class="form-control mayusc" name="Vehcolours" id="Vehcolours" placeholder="Ingresar color" required>
                                    </div>
            
                                    <div class="form-group col-md-4">
                                        <label for="ano">Año<label style="color:red">*</label></label>
                                        <input type="text" class="form-control mayusc" name="Vehyears" id="Vehyears" placeholder="Ingresar año" required>
                                    </div>
                                </div>
        
                                <div class="col-md-12">
                                    <div class="form-group col-md-4">
                                        <label for="motor">Nro. Motor<label style="color:red">*</label></label>
                                        <input type="text" class="form-control mayusc" name="Vehmotors" id="Vehmotors" placeholder="Ingresar nro. motor" required>
                                    </div>
                
                                    <div class="form-group col-md-4">
                                        <label for="serie">Nro. Serie<label style="color:red">*</label></label>
                                        <input type="text" class="form-control mayusc" name="Vehseries" id="Vehseries" placeholder="Ingresar nro. serie" required>
                                    </div>
        
                                    <div class="form-group col-md-4">
                                        <label for="estatus">Estatus<label style="color:red">*</label></label>
                                        <select class="form-control mayusc" name="Vehstatuss" id="Vehstatuss" required>
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>    
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group col-md-12">
                                        <label for="observacion">Observación</label>
                                        <textarea name="Vehobservationss" id="Vehobservationss" class="form-control mayusc" rows="4" cols="40" placeholder="Ingresar Observación"></textarea>
                                    </div>   
                                </div>
                            </div>
        
                            <div class="box-header with-border">
                                <div class="col-md-12">
                                    <div class="form-group col-md-10">
                                        <h3 class="box-title">Datos Del Cliente</h3> 
                                    </div>    
                                    
                                    <div class="form-group col-md-2" align='right'>
                                        <a href="#searchClient" rel="modal:open" data-toggle="tooltip" title="Buscar" class="search btn btn-success"><span class="fa fa-search"></span></a>
                                        <!--a href="javascript:void(0);" id="delete-client" data-toggle="tooltip" title="Eliminar" data-id="" class="delete btn btn-success"><span class="fa fa-trash-o"></span></a-->
                                    </div> 
                                </div>    
                            </div>

                            <div class="box-body">
                                <div class="col-md-12">
                                    <div class="form-group col-md-4">
                                        <label for="estatus">Tipo de Documento<label style="color:red">*</label></label>
                                        <select class="form-control mayusc" id="Clienttypes">
                                            <option value="1">D.N.I</option>
                                            <option value="2">RUC</option>
                                        </select>    
                                    </div>
    
                                    <div class="form-group col-md-4">
                                        <label for="DNI">Nro. de Documento<label style="color:red">*</label></label>
                                        <input type="text" class="form-control mayusc" id="Clientdocuments" placeholder="Ingresar documento" required disabled>
                                    </div>
               
                                    <div class="form-group col-md-4">
                                        <label for="Clientname">Nombre(s)<label style="color:red">*</label></label>
                                        <input type="text" class="form-control mayusc" id="Clientnames" placeholder="Ingresar nombre" required disabled>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="box-footer">
                                <label style="color:red">(*) Todos los campos son requeridos.</label>
                              
                                <center>
                                    <button type="submit" class="btn btn-primary" id='btn-vehicle' value="create" onclick="javascript:void(0);">Guardar</button>
                                    <button type="reset" class="btn btn-default" onclick="getClearVehiclesNew()">Cancelar</button>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
