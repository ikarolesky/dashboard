@extends('layouts.app3')

@section('title')
Adicionar Produto
@endsection
@section('content')
<a href="{{ route('products.index') }}" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Voltar</a>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
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