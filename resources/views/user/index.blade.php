@extends('layouts.app3')

@section('title', 'Users')
@section('content')
 <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-users icon-gradient bg-mean-fruit">
                                        </i>
                                    </div>
                                        <div>Usuários
                                        <div class="page-title-subheading">
                                            @can('add_users')
                                             <a href="{{ route('create') }}" class="mb-2 mr-2 btn-transition btn btn-outline-primary"> Novo Usuário</a>
                                              @endcan
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



<p></p>

<div class="card-body">
    <div class="result-set">

        <table id="datatable1" class="table table-striped table-bordered" style="width:100%">
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
                    <td style="font-size: 18px">{{ $item->created_at->isoFormat('ddd, DD  MMM YYYY h:mm:ss a') }}</td>
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




@endsection