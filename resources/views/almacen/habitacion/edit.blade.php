@extends('layouts.admin')
@section('contenido')

<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Editar Habitacion {{ $habitacion->id }}</h3>
        </div>

        <form action="{{ route('habitacion.update', $habitacion->id) }}" method="POST" class="form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="tipo">Tipo</label>
                    <input type="text" class="form-control" name="tipo" id="tipo" placeholder="Ingrese el tipo de habitación" value="{{ $habitacion->tipo }}">
                </div> 

                <div class="form-group">
                    <label for="numero">Número</label>
                    <input type="text" class="form-control" name="numero" id="numero" placeholder="Ingrese el número de habitación" value="{{ $habitacion->numero }}">
                </div> 

                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="text" class="form-control" name="precio" id="precio" placeholder="Ingrese el precio de la habitación" value="{{ $habitacion->precio }}">
                </div>

                <div class="form-group">
                    <label for="fotografias">Fotografías</label>
                    <input type="file" class="form-control" id="fotografias" name="fotografias">
                    @if ($habitacion->fotografias)
                        <img src="{{ url('fotografias/habitaciones/' . $habitacion->fotografias) }}" alt="{{ $habitacion->tipo }}" width="70px" height="70px" class="img-thumbnail">
                    @else
                        <p>No hay imagen disponible</p>
                    @endif
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success me-1 mb-1">Guardar</button>
                <button type="reset" class="btn btn-danger me-1 mb-1">Cancelar</button>
            </div>
        </form>
    </div>
</div>

@endsection

