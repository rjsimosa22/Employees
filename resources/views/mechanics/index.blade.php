@extends('layouts.index')
@extends('mechanics.edit')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
 <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Listado de Mecánicos</h1>
        <div style="margin-top:10px" align='right'><a href="#editMechanics" rel="modal:open" data-toggle="tooltip" title="Agregar" class="edit btn btn-primary add-mechanics">Agregar</a></div>
        
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-car"></i>Mecánicos</a></li>
            <li class="active">Listado</li>
        </ol>
    </section>    

    <section class="content">
        <div class="row">
           <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">
                        @include('common.notification')
                        <table width='100%' class="table table-bordered table-striped table-resposive mayuscInit listMechanicsRefres" id="listMechanics" align="center">
                            <thead>
                                <tr style="background:#222d32;color:#fff">
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Abreviación</th>
                                    <th>Comisión</th>
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