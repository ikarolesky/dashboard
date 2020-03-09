@extends('layouts.app3')
@section('title')
{{$cards->digitos}}
@endsection
@section('breadcrumbs')
                <ol class="breadcrumb ml-1">
                  <li class="breadcrumb-item"><a href="/home">Home</a></li>
                  <li class="breadcrumb-item"><a href="/cards">Cartões</li></a>
                  <li class="breadcrumb-item active" aria-current="page">Recarga: {{$cards->digitos}}</li>
                </ol>
@endsection
@section('content')
<div class="card-body">
<a href="{{ route('cards.index') }}" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Voltar</a>
    <div class="table-responsive">
        <div class="form-group">
            {!! Form::model($cards, ['method' => 'PUT', 'route' => ['recarga.update',  $cards->id ] ]) !!}
                <label for="digitos">Digitos</label>
                            <input id="digitos" class="form-control" type="integer" name="digitos" value="{{$cards->digitos}}" maxlength="7" disabled>
                <label for="saldo">Saldo</label>
                            <input id="saldo" class="form-control" type="integer" name="saldo" value="{{$cards->saldo}}" disabled>
                <label for="recarga">Valor</label>
                            <input id="valor" class="form-control" type="integer" name="valor">
                            <input hidden id="tipo" class="form-control" type="string" name="tipo" value="C">
                            <input hidden id="saldo2" class="form-control" type="string" name="saldo2" value="{{$cards->saldo}}">
                            <input hidden id="cartao_id" class="form-control" type="integer" name="cartao_id" value="{{$cards->id}}">
                <label for="descricao">Descrição</label>
                            <input id="descricao" class="form-control" type="string" name="descricao">
        </div>
            <!-- Submit Form Button -->
            <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">
                Salvar
            </button>
            {!! Form::close() !!}
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
$(document).ready(function($){

$('#saldo').mask("###000.000.000,00", {reverse: true});
$('#saldo2').mask("#.##000.000.000,00", {reverse: true});
$('#valor').mask("#.##000.000.000,00", {reverse: true});

$('#digitos').mask("00 0000");
$("#cardform").submit(function() {
  $("#saldo").unmask();
  $("#saldo2").unmask();
  $("#valor").unmask();
});
});
</script>
@endsection
