@extends('layouts.admin')

@section('contenido')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">LISTADO DE HABITACIONES</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Habitaciones</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- /.content-header -->

<!-- Hoverable rows start -->
<section class="section">
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="col-xl-12">
                        <form action="{{ route('habitacion.index') }}" method="get">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group mb-6">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                                        <input type="text" class="form-control" name="texto" placeholder="Buscar habitaciones" value="{{ $query }}" aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group mb-6">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-plus-circle-fill"></i></span>
                                        <a href="{{ route('habitacion.create') }}" class="btn btn-success">Nueva</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body"></div>
                    <!-- table hover -->
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Id</th>
                                    <th>Tipo</th>
                                    <th>Numero</th>
                                    <th>Precio</th>
                                    <th>Fotografias</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($habitaciones as $hab)
                                <tr>
                                    <td>
                                        <a href="{{ route('habitacion.edit', $hab->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
                                        <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{ $hab->id }}"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                    <td>{{ $hab->id }}</td>
                                    <td>{{ $hab->tipo }}</td>
                                    <td>{{ $hab->numero }}</td>
                                    <td>{{ $hab->precio }}</td>
                                    <td><img src="http://localhost/examenalexfer/public/fotografias/habitaciones/{{$hab->fotografias}}" alt="{{ $hab->tipo }}" width="70px" height="70px" class="img-thumbnail"></td>
                                </tr>
                                @include('almacen.habitacion.modal')
                                @endforeach
                            </tbody>
                        </table>
                        {{ $habitaciones->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hoverable rows end -->
@endsection

