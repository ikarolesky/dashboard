@extends('layouts.app3')

@section('title')
Adicionar Produto
@endsection
@section('content')
                                <div class="page-title-heading">
                                    <div>Novo Produto
                                        <div class="page-title-subheading"><a href="{{ route('products.index') }}" class="mb-2 mr-2 btn-transition btn btn-outline-primary">Voltar</a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
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
                            {!! Form::submit('Criar', ['class' => 'mb-2 mr-2 btn-transition btn btn-outline-primary']) !!}
                            {!! Form::close() !!}


@endsection