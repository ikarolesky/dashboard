@extends('layouts.app2')

@section('title', 'Edit User ' . $user->name)

@section('content')

 <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div>Editar usuário: {{ $user->name}}
                                        <div class="page-title-subheading">
                                            <a href="{{ route('users.index') }}" class="mb-2 mr-2 btn-transition btn btn-outline-primary">Voltar</a>
                                        </div>
                                    </div>
                                </div>
                             </div>
                        </div>

                        <div class="main-card mb-3 card">
                            <div class="card-body">


<div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        {!! Form::model($user, ['method' => 'PUT', 'route' => ['users.update',  $user->id ] ]) !!}
                            @include('user._form')
                            <!-- Submit Form Button -->
                            {!! Form::submit('Salvar', ['class' => 'mb-2 mr-2 btn-transition btn btn-outline-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

                        </div>
                    </div>
                    @endsection