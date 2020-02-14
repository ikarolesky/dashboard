@extends('layouts.app')
@section('content')
@if (Auth::user()->name === 'Kings7Admin')
<div class="card-body">
    <div class="result-set">

        <table class="table table-bordered table-striped table-hover" id="data-table">
            <thead>
            <tr>
                <th style="font-size: 18px">Id</th>
                <th style="font-size: 18px">Name</th>
                <th style="font-size: 18px">Email</th>
                <th style="font-size: 18px">Active</th>
                <th style="font-size: 18px">Telefone</th>
                <th style="font-size: 18px">Estado</th>
                <th style="font-size: 18px">Cidade</th>
                <th style="font-size: 18px">Pais</th>
                <th style="font-size: 18px">Documento</th>
                <th style="font-size: 18px">Cep</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $object)
                <tr>
                    <td style="font-size: 18px">{{ $object->id }}</td>
                    <td style="font-size: 18px">{{ $object->name }}</td>
                    <td style="font-size: 18px">{{ $object->email }}</td>
                    @if (($object->active) === 1)
                    <td style="font-size: 18px">Yes</td>
                    @elseif (($object->active) === 0)
                    <td style="font-size: 18px">No</td>
                    @endif
                    <td style="font-size: 18px">{{ $object->phone }}</td>
                    <td style="font-size: 18px">{{ $object->address_state }}</td>
                    <td style="font-size: 18px">{{ $object->address_city }}</td>
                    <td style="font-size: 18px">{{ $object->address_country }}</td>
                    <td style="font-size: 18px">{{ $object->doc }}</td>
                    <td style="font-size: 18px">{{ $object->address_zip }}</td>
    </tr>
            @endforeach
            </tbody>
        </table>
@endif


@endsection