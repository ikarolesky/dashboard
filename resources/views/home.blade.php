@extends('layouts.app3')

@section('title')
Dashboard
                <ol class="breadcrumb ml-1">
                  <li class="breadcrumb-item active" aria-current="page"><a href="/home">Home</a></li>
                </ol>
@endsection
@section('content')





                    <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                    </div>
                    @endif
                    Bem-vindo, {{Auth::user()->name}}!!
                   </div>

@endsection
