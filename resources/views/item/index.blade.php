@extends('layouts.index')
@extends('item.edit')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
 <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Listado de Rubros</h1>
        <div style="margin-top:10px" align='right'><a href="#editItems" rel="modal:open" data-toggle="tooltip" title="Agregar" class="edit btn btn-primary add-items">Agregar</a></div>
        
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-car"></i>Rubros</a></li>
            <li class="active">Listado</li>
        </ol>
    </section>    

    <section class="content">
        <div class="row">
           <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">
                        @include('common.notification')
                        <table width='100%' class="table table-bordered table-striped table-resposive mayuscInit listItemssRefres" id="listItemss" align="center">
                            <thead>
                                <tr style="background:#222d32;color:#fff">
                                    <th>Id</th>
                                    <th>Rubro</th>
                                    <th>Sub Rubro</th>
                                    <th>Abreviación</th>
                                    <th>Símbolo</th>
                                    <th>Precio</th>
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