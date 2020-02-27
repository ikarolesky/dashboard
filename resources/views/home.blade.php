@extends('layouts.app3')

@section('title')
Dashboard
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
