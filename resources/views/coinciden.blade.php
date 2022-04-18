@extends('layout')

@section('title', 'Cruce')

@section('content')
        
        <div class="container text-align:center">
            <h1 style="text-align:center; font-size:50px">CRUCE INVENTARIO</h1>
            
            <table class="table">
                <tr>
                <th>Item</th>
                    <th>Placa</th>
                    <th>Nserie</th>
                    <th>Proceso</th>
                    <th>Tipo_equipo</th>
                    <th>Modelo</th>
                    <th>Usuario</th>
                
                @foreach( $data as $dat)
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                        <td>{{ $dat->placa }}</td>
                        <td>{{ $dat->nserie }}</td>
                        <td>{{ $dat->proceso }}</td>
                        <td>{{ $dat->tipo_equipo }}</td>
                        <td>{{ $dat->modelo }}</td>
                        <td>{{ $dat->usuario }}</td>
                    
                    </tr>
                @endforeach
            </table>
        
        </div>

@endsection