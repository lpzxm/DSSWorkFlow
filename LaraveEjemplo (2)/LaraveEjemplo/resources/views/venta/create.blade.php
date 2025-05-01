@extends('layouts.miPlantilla')
@section('titulo', 'Crear')
@section('contenido')
    <a href="{{route('venta.index')}}">Volver</a>
    <form method="post" action="{{route('venta.store')}}">
        @csrf <!--generacion automatica de token para peticiones de tipo POST -->
        Producto: </br>
        <input type="text" name="producto" /></br>
        Cantidad: </br>
        <input type="text" name="cantidad" /></br>
        Precio: </br>
        <input type="text" name="precio" /></br>
        Total: </br>
        <input type="text" name="total" /></br>
        <input type="submit" value="Enviar" />
    </form>
    <footer>
        <p class="footer-name">José Adrián López Medina</p>
        <p class="footer-career">Técnico en Ingeniería en Computación</p>
        <p class="footer-year">Ciclo I - 2025</p>
    </footer>
@endsection