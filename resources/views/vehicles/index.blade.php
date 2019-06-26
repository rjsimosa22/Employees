@extends('layouts.index')
@extends('vehicles.edit')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
 <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Listado  de vehículo</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-car"></i>Vehículos</a></li>
            <li class="active">Listado</li>
        </ol>
    </section>    

    <section class="content">
        <div class="row">
           <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">
                       @include('common.notification')
                        <table width='100%' class="table table-bordered table-striped table-resposive mayuscInit listVehiclesRefres" id="listVehicles" align="center">
                            <thead>
                                <tr style="background:#222d32;color:#fff">
                                    <th>Id</th>
                                    <th>Placa</th>
                                    <th>Categoría </th>
                                    <th>Marca </th>
                                    <th>Modelo</th>
                                    <th>Año</th>
                                    <th>Propietario</th>
                                    <th>Estatus</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection