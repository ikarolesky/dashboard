@extends('layouts.app3')

@section('title')
Produtos
                <ol class="breadcrumb ml-1">
                  <li class="breadcrumb-item"><a href="/home">Home</a></li>
                  <li class="breadcrumb-item"><a href="/products">Produtos</li></a>
                  <li class="breadcrumb-item active" aria-current="page">Todos</li>
                </ol>
@endsection
@section('content')
<a href="{{ route('products.create') }}" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"> Novo Produto
</a>
<table id="datatable1" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Nome</th>
            <th>URL</th>
            <th>Plataformas</th>
            <th>Criado em</th>
            <th>Editado em</th>
            <th>Ativo</th>
            <th>Editar</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->url }}</td>
            <td>
                <?php
                $plataformas = App\Product::find($item->id)->plataforms
                ?>
                @foreach ($plataformas as $plat)
                @if ($plat->plataforma_id == '1')
                <p>Monetizze</p>
                @endif
                @if($plat->plataforma_id == '2')
                <p>PerfectPay</p>
                @endif
                @if($plat->plataforma_id == '3')
                <p>Braip</p>
                @endif
                @endforeach
            </td>
            <td>{{ $item->created_at->isoFormat('DD/MM/YY') }}</td>
            <td>{{ $item->updated_at->isoFormat('DD/MM/YY') }}</td>
            @if ($item->is_active == 1)
            <td>Sim</td>
            @elseif ($item->is_active == 0)
            <td>Não</td>
            @endif
            <td class="text-center">
                @include('products._actions', [
                    'entity' => 'products',
                    'id' => $item->id
                ])
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection