@extends('layouts.miPlantilla')
@section('titulo', 'Inicio')
@section('contenido')
    <a href="{{route('venta.create')}}">Nueva materia</a>
    <table border='1' style='border-collapse:collapse'>
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Producto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($listaVentas as $venta)
                <tr>
                    <th scope="row">{{$venta->id}}</th>
                    <td>{{$venta->producto}}</td>
                    <td>{{$venta->cantidad}}</td>
                    <td>{{$venta->precio}}</td>
                    <td>{{$venta->total}}</td>
                    <td>
                        <a href="{{ route('venta.edit', $venta->id) }}" class="btn btn-sm btn-warning">Editar</a>

                        <form action="{{ route('venta.destroy', $venta->id) }}" method="POST" style="display:inline;"
                            onsubmit="return confirm('¿Seguro que deseas eliminar esta venta?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <footer>
        <p class="footer-name">José Adrián López Medina</p>
        <p class="footer-career">Técnico en Ingeniería en Computación</p>
        <p class="footer-year">Ciclo I - 2025</p>
    </footer>
@endsection