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
                    <th>ID</th>
                    <th>Card ID</th>
                    <th>Descrição</th>
                    <th class="header">Valor (R$)</th>
                    <th>Tipo</th>
                    <th>Lançado em</th>
                </tr>
            </thead>
            <tbody>
            @foreach($lancamentos as $lancamento)
                <tr>
                    <td>{{ $lancamento->id }}
                    <td scope="row">{{ $lancamento->cartao_digitos }}</td>
                    <td>{{ $lancamento->descrição}}</td>
                    <td>{{$lancamento->valor}}</td>
                    @if ($lancamento->tipo == 'D')
                    <td><font color="red">{{$lancamento->tipo}}</font></td>
                    @else
                    <td><font color="blue">{{$lancamento->tipo}}</font></td>
                    @endif
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
$(document).ready(function() {
  var $table = $("table.table");

  if ($table.length > 0) {
    var ValorTh = $("th.header:contains('Valor (R$)')");
    var ValorColumnIndex = $(ValorTh).index();
    var Valor_rows = $($table).find('tr');

      $(Valor_rows).each(function() {
      var $td = $(this).find('td').eq(ValorColumnIndex);
      var formatted = Number($td.text().replace(",",".")).toLocaleString('pt-BR', {style:'currency', currency: 'BRL'});
      $td.text(formatted);
      });
  }
});
</script>
@endsection

