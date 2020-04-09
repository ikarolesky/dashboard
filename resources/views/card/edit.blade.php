@extends('layouts.app3')
@section('title')
{{$cards->digitos}}
@endsection
@section('breadcrumbs')
                <ol class="breadcrumb ml-1">
                  <li class="breadcrumb-item"><a href="/home">Home</a></li>
                  <li class="breadcrumb-item"><a href="/cards">Cartões</li></a>
                  <li class="breadcrumb-item active" aria-current="page">Editar: {{$cards->digitos}}</li>
                </ol>
@endsection
@section('content')
<div class="card-body">
<a href="{{ route('cards.index') }}" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Voltar</a>
    <div class="table-responsive">
           <div class="form-group">
            {!! Form::model($cards, ['method' => 'PUT', 'route' => ['cards.update',  $cards->id ] ]) !!}
                <label for="digitos">Digitos</label>
                            <input id="digitos" class="form-control" type="integer" name="digitos" value="{{$cards->digitos}}" maxlength="7">
                <label for="cartao_banco_id">Banco</label>
                            <select id="cartao_banco_id" name="cartao_banco_id" type="cartao_banco_id" required class="custom-select">
                                @foreach($bancos as $banco)
                                <option value="{{$banco->id}}">
                                 {{$banco->nome}}
                                </option>
                                @endforeach
                        </select>
                </label>
                <label for="tipo">Tipo</label>
                        <select id="tipo" name="tipo" type="tipo" required class="custom-select">
                        @if ($cards->tipo == 'Pré-pago')
                            <option value="{{$cards->tipo}}">
                                    {{$cards->tipo}}
                            </option>
                            <option value="Crédito">Crédito</option>
                        @endif
                        @if ($cards->tipo == 'Crédito')
                            <option value="{{$cards->tipo}}">
                                    {{$cards->tipo}}
                            </option>
                            <option value="Pré-pago">Pré-pago</option>
                        @endif
                        </select>
                </label>
            </div>
            <!-- Submit Form Button -->
            <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">
                Salvar
            </button>
            {!! Form::close() !!}
    </div>
</div>
@endsection
