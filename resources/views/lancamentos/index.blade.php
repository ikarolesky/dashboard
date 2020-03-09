@extends('layouts.app3')

@section('title')
Cartões
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
@endsection
@section('breadcrumbs')
                <ol class="breadcrumb ml-1">
                  <li class="breadcrumb-item"><a href="/home">Home</a></li>
                  <li class="breadcrumb-item"><a href="/cards">Cartões</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Lançamentos</li>
                </ol>
@endsection
@section('content')
@if (\Session::has('success'))
    <div class="alert alert-success" align="center" row="8">
        {!! \Session::get('success') !!}
    </div>
@endif
@if (\Session::has('danger'))
    <div class="alert alert-danger" align="center" row="8">
         {!! \Session::get('danger') !!}
    </div>
@endif
<div class="card">
<div table="responsive">
<div class="table-responsive">
<table class="table" id="datatable1" >
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descrição</th>
                    <th>Valor (R$)</th>
                    <th>Tipo</th>
                    <th>Lançado em</th>
                </tr>
            </thead>
            <tbody>
            @foreach($lancamentos as $lancamento)
                <tr>
                    <td scope="row">{{ $lancamento->id }}</td>
                    <td>{{ $lancamento->descrição}}</td>
                    @if ($lancamento->tipo == 'D')
                    <td><font color="red">{{'-'. ' ' . $lancamento->valor . ' ' . $lancamento->tipo }}</font></td>
                    @else
                    <td class=""><font color="blue">{{'+'. ' ' . $lancamento->valor . ' ' . $lancamento->tipo }}</font></td>
                    @endif
                    <td>{{ $lancamento->tipo }}</td>
                    <td class="text-center">{{ $lancamento->created_at->isoFormat('DD/MM/YY') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/app-assets/js/scripts/moneymask/money.mask.js"></script>
<script>
$(document).ready(function($){
$('.teste').mask('###.000.000,00', {reverse: true});
});
</script>
@endsection

