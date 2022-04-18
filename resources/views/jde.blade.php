@extends('layout')

@section('title', 'Inven JDE')

@section('content')
    <div class="container text-align:center">
        <h1 style="text-align:center; font-size:50px">JDE</h1>
        
        <table class="table">
            <tr>
                <th>Item</th>
                <th>Placa</th>
                <th>Nserie</th>
                <th>Proceso</th>
                <th>Tipo_proceso</th>
                <th>Modelo</th>
                <th>Usuario</th>
            </tr>
            @foreach( $data2 as $dat)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $dat->placa }}</td>
                    <td>{{ $dat->nserie }}</td>
                    <td>{{ $dat->proceso }}</td>
                    <td>{{ $dat->tipo_proceso }}</td>
                    <td>{{ $dat->modelo }}</td>
                    <td>{{ $dat->usuario }}</td>
                </tr>
            @endforeach
        </table>
       
    </div>

@endsection