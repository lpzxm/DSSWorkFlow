@extends('layouts.miPlantilla')
@section('titulo', 'Inicio')
@section('contenido')
    <div class="container mt-4">
        <h3>Editar Venta</h3>
        <form action="{{ route('venta.update', $venta->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Producto</label>
                <input type="text" name="producto" class="form-control" value="{{ $venta->producto }}" required>
            </div>
            <div class="mb-3">
                <label>Cantidad</label>
                <input type="number" name="cantidad" class="form-control" value="{{ $venta->cantidad }}" required>
            </div>
            <div class="mb-3">
                <label>Precio</label>
                <input type="number" name="precio" class="form-control" value="{{ $venta->precio }}" required>
            </div>
            <div class="mb-3">
                <label>Total</label>
                <input type="number" name="total" class="form-control" value="{{ $venta->total }}" required>
            </div>
            <button class="btn btn-primary">Actualizar</button>
            <a href="{{ route('venta.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

@endsection