@extends('layout')

@section('title', 'Inven Proacti')

@section('content')
        
    <div class="container text-align:center">
        <h1 style="text-align:center; font-size:50px">PROACTIVANET</h1>
        
        <table class="table">
            <tr>
                <th>Item</th>
                <th>Nserie</th>
                <th>Proceso</th>
                <th>Tipo_proceso</th>
               
            @foreach( $data as $dat)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $dat->placa }}</td>
                    <td>{{ $dat->localizacion }}</td>
                    <td>{{ $dat->sistema_operativo }}</td>
                 
                </tr>
            @endforeach
        </table>
       
    </div>

@endsection