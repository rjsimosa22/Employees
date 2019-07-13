@extends('layouts.index')
@extends('system.edit')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
 
    <section class="content-header">
        <h1>Listado de {{$module}}</h1>
        <div style="margin-top:10px" align='right'><a href="#editSystem" rel="modal:open" data-toggle="tooltip" title="Agregar" class="edit btn btn-primary add-system">Agregar</a></div>
         
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-car"></i>Listado de {{$module}}</a></li>
            <li class="active">Listado</li>
        </ol>
    </section>    

    <section class="content">
        <div class="row">
           <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">
                        @include('common.notification')
                        <table width='100%' class="table table-bordered table-striped table-resposive mayuscInit listSystemRefres" id="listSystem" align="center">
                            <thead>
                                <tr style="background:#222d32;color:#fff">
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Abreviación</th>
                                    <th>Estatus</th>
                                    <th>Fecha de Creación</th>
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