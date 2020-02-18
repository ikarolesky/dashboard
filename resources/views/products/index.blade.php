@extends('layouts.app2')

@section('title', 'Users')
@section('content')
 <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div>Meus Produtos
                                        <div class="page-title-subheading"><a href="{{ route('produtos.create') }}" class="mb-2 mr-2 btn-transition btn btn-outline-primary"> Novo Produto</a>
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
                <th style="font-size: 18px">Criado em</th>
                <th style="font-size: 18px">Ativo</th>
            </tr>
            </thead>
            <tbody>
            @foreach($result as $item)
                <tr>
                    <td style="font-size: 18px">{{ $item->id }}</td>
                    <td style="font-size: 18px">{{ $item->name }}</td>
                    <td style="font-size: 18px">{{ $item->url }}</td>
                    <td style="font-size: 18px">{{ $item->created_at->DiffforHumans() }}</td>
                    @if ($item->is_active == 1)
                    <td style="font-size: 18px">Sim</td>
                    @elseif ($item->is_active == 0)
                    <td style="font-size: 18px">Não</td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="text-center">

        </div>



@endsection