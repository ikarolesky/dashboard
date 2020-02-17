@extends('layouts.app2')

@section('title', 'Users')
@section('content')
 <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div>{{ $result->total() }} {{ Str::plural('Produto', $result->count()) . " " . Str::plural('Encontrado', $result->count())}}
                                        <div class="page-title-subheading">
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
    <div class="result-set">

        <table id="datatable1" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th style="font-size: 18px">Id</th>
                <th style="font-size: 18px">Nome</th>
                <th style="font-size: 18px">URL</th>
                <th style="font-size: 18px">Id do usuário</th>
                <th style="font-size: 18px">Criado em</th>
                <th style="font-size: 18px">Ativo</th>
            </tr>
            </thead>
            <tbody>
            @foreach($result as $item)
                <tr>
                    <td style="font-size: 18px">{{ $item->id }}</td>
                    <td style="font-size: 18px">{{ $item->name }}</td>
                    <td style="font-size: 18px">{{ $item->email }}</td>
                    <td style="font-size: 18px">{{ $item->roles->implode('name', ', ') }}</td>
                    <td style="font-size: 18px">{{ $item->created_at->DiffforHumans() }}</td>
                    @if ($item->active == 1)
                    <td style="font-size: 18px">Sim</td>
                    @elseif ($item->active == 0)
                    <td style="font-size: 18px">Não</td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="text-center">
            {{ $result->links() }}
        </div>



@endsection