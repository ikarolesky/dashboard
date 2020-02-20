@extends('layouts.app2')


@section('title', 'Users')
@section('content')
 <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-plus icon-gradient bg-mean-fruit">
                                        </i>
                                    </div>
                                <div class="page-title-heading">
                                    <div>Novo Produto
                                        <div class="page-title-subheading"><a href="{{ route('products.index') }}" class="mb-2 mr-2 btn-transition btn btn-outline-primary">Voltar</a>
                                        </div>
                                    </div>
                                </div>
                             </div>
                        </div>
<!--                         <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                            <li class="nav-item">
                                <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                                    <span>Layout</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
                                    <span>Grid</span>
                                </a>
                            </li>
                        </ul> -->

                        <div class="main-card mb-3 card">
                            <div class="card-body">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                            <div class="ibox float-e-margins">
                            <div class="ibox-content">

                            {!! Form::open(['route' => 'products.store']) !!}
                            @include('products._forms')
                            <!-- Submit Form Button -->
                            {!! Form::submit('Criar', ['class' => 'mb-2 mr-2 btn-transition btn btn-outline-primary']) !!}
                            {!! Form::close() !!}
                            </div>
                            </div>
                            </div>
                        </div>



@endsection