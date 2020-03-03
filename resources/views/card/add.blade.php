@extends('layouts.app3')

@section('title')
Adicionar Cartão
@endsection
@section('breadcrumbs')
                <ol class="breadcrumb ml-1">
                  <li class="breadcrumb-item"><a href="/home">Home</a></li>
                  <li class="breadcrumb-item"><a href="/cards">Cartões</li></a>
                  <li class="breadcrumb-item active" aria-current="page">Novo</li>
                </ol>
@endsection
@section('content')
<a href="{{ route('cards.index') }}" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Voltar</a>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </ul>
</div>
@endif

{!! Form::open(['route' => 'cards.store', 'id' => 'cardform']) !!}
@include('card._forms')
{!! Form::close() !!}
@endsection