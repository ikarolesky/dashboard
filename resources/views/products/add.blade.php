@extends('layouts.app3')

@section('title')
Adicionar Produto
                <ol class="breadcrumb ml-1">
                  <li class="breadcrumb-item">Home</li>
                  <li class="breadcrumb-item">Produtos</li>
                  <li class="breadcrumb-item active" aria-current="page">Novo</li>
                </ol>
@endsection
@section('content')
<a href="{{ route('products.index') }}" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Voltar</a>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </ul>
</div>
@endif

{!! Form::open(['route' => 'products.store']) !!}
@include('products._forms')
<!-- Submit Form Button -->
<button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">
    Criar
</button>
{!! Form::close() !!}


@endsection