@extends('layouts.app3')

@section('title')
Usuários
                <ol class="breadcrumb ml-1">
                  <li class="breadcrumb-item"><a href="/home">Home</a></li>
                  <li class="breadcrumb-item"><a href="/users">Usuários</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Todos</li>
                </ol>
@endsection
@section('content')

@can('add_users')
<a href="{{ route('create') }}" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"> Novo Usuário</a>
@endcan
@if (\Session::has('success'))
    <div class="alert alert-success" align="center" row="8">
        {!! \Session::get('success') !!}
    </div>
@endif
@if (\Session::has('danger'))
    <div class="alert alert-danger" align="center" row="8">
         {!! \Session::get('danger') !!}
    </div>
@endif
<table id="datatable1" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Função</th>
                    <th>Criado em</th>
                    <th>Ativo</th>
                    @can('edit_users', 'delete_users')
                    <th class="text-center">Ações</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
            @foreach($result as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->roles->implode('name', ', ') }}</td>
                    <td>{{ $item->created_at->isoFormat('DD/MM/YY') }}</td>
                    @if ($item->active == 1)
                    <td>
                        <div class="chip chip-success">
                            <div class="chip-body">
                                <div class="chip-text"><i class="feather icon-check" ></i>Ativo</div>
                            </div>
                        </div>
                    </td>
                    @elseif ($item->active == 0)
                    <td>
                        <div class="chip chip-danger">
                            <div class="chip-body">
                                <div class="chip-text"><i class="feather icon-x" ></i>Inativo</div>
                            </div>
                        </div>
                    </td>
                    @endif
                    @can('edit_users')
                    <td class="text-center">
                        @include('user._actions', [
                            'entity' => 'users',
                            'id' => $item->id
                        ])
                    </td>
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>
@endsection