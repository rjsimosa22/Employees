@extends('layouts.index')
@extends('subproduct.edit')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
 <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Listado Sub Productos</h1>
        <div style="margin-top:10px" align='right'><a href="#editSubProduct" rel="modal:open" data-toggle="tooltip" title="Agregar" class="edit btn btn-primary add-subproduct">Agregar</a></div>
        
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-car"></i>Sub Producto</a></li>
            <li class="active">Listado</li>
        </ol>
    </section>    

    <section class="content">
        <div class="row">
           <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">
                        @include('common.notification')
                        <table width='100%' class="table table-bordered table-striped table-resposive mayuscInit listSubProductsRefres" id="listSubProductss" align="center">
                            <thead>
                                <tr style="background:#222d32;color:#fff">
                                    <th>Id</th>
                                    <th>Productos</th>
                                    <th>Sub Productos</th>
                                    <th>Abreviación</th>
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