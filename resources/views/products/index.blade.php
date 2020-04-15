@extends('layouts.app3')

@section('title')
Produtos
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
@endsection
@section('breadcrumbs')
                <ol class="breadcrumb ml-1">
                  <li class="breadcrumb-item"><a href="/home">Home</a></li>
                  <li class="breadcrumb-item"><a href="/products">Produtos</li></a>
                  <li class="breadcrumb-item active" aria-current="page">Todos</li>
                </ol>
@endsection
@section('content')
<a href="{{ route('products.create') }}" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"> Novo Produto
</a>
<div class="card">
<div table="responsive">
<div class="table-responsive">
<table class="table " id="datatable1">
    <thead>
        <tr>
            <th>Nome</th>
            <th>URL</th>
            <th>Plataformas</th>
            <th>Criado em</th>
            <th>Editado em</th>
            <th class="text-center">Ativo</th>
            <th class="text-center">Ações</th>
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
                @if(in_array($plat->plataforma_id, $plats->pluck('id')->toArray()))
                    <p>{{$plats->where('id', $plat->plataforma_id)->first()->name}}</p>
                @endif
                @endforeach
            </td>
            <td>{{ $item->created_at->isoFormat('DD/MM/YY') }}</td>
            <td>{{ $item->updated_at->isoFormat('DD/MM/YY') }}</td>
            <td class="text-center">
            <input type="checkbox" data-id="{{ $item->id }}" name="is_active" class="js-switch " {{ $item->is_active == 1 ? 'checked' : '' }}>
            </td>
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
</div>
</div>
<script>let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
    let switchery = new Switchery(html,  { size: 'small', color: '#7367F0', secondaryColor    : '#e2e2e2' });
});</script>
<script>$(document).ready(function(){
    $('.js-switch').change(function () {
        let is_active = $(this).prop('checked') === true ? 1 : 0;
        let prodId = $(this).data('id');
        $.ajax({
            type: "get",
            dataType: "json",
            url: '{{ route('products.status') }}',
            data: {'is_active': is_active, 'produto_id': prodId},
            success: function (data) {
                console.log(data.message);
            }
        });
    });
});
</script>
@endsection