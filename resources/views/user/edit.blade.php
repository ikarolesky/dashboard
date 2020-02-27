@extends('layouts.app3')
@section('title')
{{$user->name}}
                <ol class="breadcrumb ml-1">
                  <li class="breadcrumb-item">Home</li>
                  <li class="breadcrumb-item">Usuários</li>
                  <li class="breadcrumb-item active" aria-current="page">Editar: {{$user->name}}</li>
                </ol>
@endsection
@section('content')
<a href="{{ route('users.index') }}" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Voltar</a>
{!! Form::model($user, ['method' => 'PUT', 'route' => ['users.update',  $user->id ] ]) !!}
@include('user._form')
<!-- Submit Form Button -->
<button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Salvar</button>
{!! Form::close() !!}
@endsection