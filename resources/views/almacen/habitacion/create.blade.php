@extends('layouts.admin')

@section('contenido')

<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Nueva Habitación</h3>
        </div>

        <form action="{{ route('habitacion.store') }}" method="POST" enctype="multipart/form-data" class="form">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="tipo">Tipo</label>
                    <input type="text" class="form-control" name="tipo" id="tipo" placeholder="Ingrese el tipo de habitación">
                </div>

                <div class="form-group">
                    <label for="numero">Número</label>
                    <input type="text" class="form-control" name="numero" id="numero" placeholder="Ingrese el número de habitación">
                </div>

                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="text" class="form-control" name="precio" id="precio" placeholder="Ingrese el precio de la habitación">
                </div>

                <div class="form-group">
                    <label for="fotografias">Fotografías</label>
                    <input type="file" class="form-control" id="fotografias" name="fotografias">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success me-1 mb-1">Guardar</button>
                <a href="{{ route('habitacion.index') }}" class="btn btn-danger me-1 mb-1">Cancelar</a>
            </div>
        </form>
    </div>
</div>

@endsection


