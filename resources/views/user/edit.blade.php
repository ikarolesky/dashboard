@extends('layouts.app3')
@section('title')
{{$user->name}}
@endsection
@section('breadcrumbs')
                <ol class="breadcrumb ml-1">
                  <li class="breadcrumb-item"><a href="/home">Home</a></li>
                  <li class="breadcrumb-item"><a href="/users">Usuários</a></li>
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