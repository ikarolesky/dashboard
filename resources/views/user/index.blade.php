@extends('layouts.app2')

@section('title', 'Users')


@section('content')

<div class="app-main__outer">
    <div class="app-main__inner">

                @if (\Session::has('success'))

    <div class="alert alert-success" align="center" row="8">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif

 @if (\Session::has('danger'))

    <div class="alert alert-danger" align="center" row="8">
        <ul>
            <li>{!! \Session::get('danger') !!}</li>
        </ul>
    </div>
@endif
    <div class="row">

        <div class="col-md-12" >
            <div class="card">
            <div class="card-header"><h4 class="modal-title" >{{ $result->total() }} {{ Str::plural('Usuário', $result->count()) . " " . Str::plural('Encontrado', $result->count())}}</h4></div></div>
<p></p>
<div class="col-md-12" style="text-align: center">
            @can('add_users')
                <a href="{{ route('create') }}" class="mb-2 mr-2 btn btn-warning"> <i class="metismenu-icon pe-7s-plus"> Novo Usuário</a></i>
            @endcan
        </div>
    </div>
<div class="card-body">
    <div class="result-set">

        <table class="table table-bordered table-striped table-hover" id="data-table">
            <thead>
            <tr>
                <th style="font-size: 18px">Id</th>
                <th style="font-size: 18px">Nome</th>
                <th style="font-size: 18px">Email</th>
                <th style="font-size: 18px">Função</th>
                <th style="font-size: 18px">Criado em</th>
                <th style="font-size: 18px">Ativo</th>
                @can('edit_users', 'delete_users')
                <th class="text-center" style="font-size: 18px">Ações</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach($result as $item)
                <tr>
                    <td style="font-size: 18px">{{ $item->id }}</td>
                    <td style="font-size: 18px">{{ $item->name }}</td>
                    <td style="font-size: 18px">{{ $item->email }}</td>
                    <td style="font-size: 18px">{{ $item->roles->implode('name', ', ') }}</td>
                    <td style="font-size: 18px">{{ $item->created_at->toFormattedDateString() }}</td>
                    @if ($item->active == 1)
                    <td style="font-size: 18px">Sim</td>
                    @elseif ($item->active == 0)
                    <td style="font-size: 18px">Não</td>
                    @endif
                    @can('edit_users')
                    <td class="text-center">
                        @include('shared._actions', [
                            'entity' => 'users',
                            'id' => $item->id
                        ])
                    </td>
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="text-center">
            {{ $result->links() }}
        </div>
    </div>



@endsection