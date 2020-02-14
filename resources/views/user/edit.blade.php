@extends('layouts.app2')

@section('title', 'Edit User ' . $user->name)

@section('content')
<div class="app-main__outer">

    <div class="app-main__inner">
    <div class="row">
        <div class="col-md-5">
            <h3>Editar usuário: {{ $user->name}}</h3>
            {{$roles->id}} if that have id = 1 then show form
        </div>
        <div class="col-md-7 page-action text-right">
            <a href="{{ route('users.index') }}" class="mb-2 mr-2 btn-transition btn btn-outline-warning"> <i class="metismenu-icon pe-7s-back" style="font-size: 25px"> Voltar</a></i>
        </div>

    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        {!! Form::model($user, ['method' => 'PUT', 'route' => ['users.update',  $user->id ] ]) !!}
                            @include('user._form')
                            <!-- Submit Form Button -->
                            {!! Form::submit('Save Changes', ['class' => 'mb-2 mr-2 btn-transition btn btn-outline-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection