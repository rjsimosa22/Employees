@extends('layouts.index')
@extends('movementscash.edit')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
 <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Listado Movimientos de Caja</h1>
        <div style="margin-top:10px" align='right'><a href="#editMovementsCash" rel="modal:open" data-toggle="tooltip" title="Agregar" class="edit btn btn-primary add-movementscash">Agregar</a></div>
        
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-car"></i>Movimientos de Caja</a></li>
            <li class="active">Listado</li>
        </ol>
    </section>    

    <section class="content">
        <div class="row">
           <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">
                        @include('common.notification')
                        <table width='100%' class="table table-bordered table-striped table-resposive mayuscInit listMovementsCashRefres" id="listMovementsCash" align="center">
                           <thead>
                                <tr style="background:#222d32;color:#fff">
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Abreviación</th>
                                    <th>Tipo de Movimiento</th>
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