@extends('layouts.app3')
@section('title')
{{$product->name}}
@endsection
@section('breadcrumbs')
                <ol class="breadcrumb ml-1">
                  <li class="breadcrumb-item"><a href="/home">Home</a></li>
                  <li class="breadcrumb-item"><a href="/products">Produtos</li></a>
                  <li class="breadcrumb-item active" aria-current="page">Editar: {{$product->name}}</li>
                </ol>
@endsection
@section('content')
<a href="{{ route('products.index') }}" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Voltar</a>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </ul>
</div>
@endif

<?php
$plataformas = App\Product::find($product->id)->plataforms
?>

{!! Form::model($product, ['method' => 'PUT', 'route' => ['products.update',  $product->id ] ]) !!}

<!-- Name Form Input -->
                <div class="form-group">
                    <label for="name">Nome do Produto</label>
                        <input id="name" type="text" name="name" value="{{$product->name}}" class="form-control">
                </div>

<!-- URL Form Input -->
                <div class="form-group">
                    <label for="url">Nome do Produto</label>
                        <input id="url" type="text" name="url" value="{{$product->url}}" class="form-control">
                </div>

<table class="table table-bordered" id="dynamicTable">
    <tr>
        <th>Plataforma</th>
        <th>Código do Produto</th>
        <th>Chave de Autenticação</th>
        <th>Chave do Produto</th>
        <th></th>
    </tr>
    <tr>
        <td><input id="plataforma" name="addmore[0][plataforma]"  class="form-control"/></td>
        <td><input type="text" name="addmore[0][codigo_produto]" class="form-control" /></td>
        <td><input type="text" name="addmore[0][basic_authentication]" class="form-control" /></td>
        <td><input type="text" name="addmore[0][product_key]" class="form-control" /></td>
        <td><button type="button" name="add" id="add" class="btn btn-icon btn-icon rounded-circle btn-success mr-1 mb-1"><i class="feather icon-plus"></i></button></td>
    </tr>
</table>
<script
  src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
  crossorigin="anonymous"></script>
<script type="text/javascript">
    var i = 0;
    $("#add").click(function(){
        if (i >= 2) return;
        ++i;
        $("#dynamicTable").append('<tr><td><select id="plataforma" name="addmore['+i+'][plataforma]" class="form-control">@foreach($plataforma as $plat)<option value="{{$plat->id}}">{{$plat->name}}</option>@endforeach</select></td><td><input type="text" name="addmore['+i+'][codigo_produto]" class="form-control" /></td><td><input type="text" name="addmore['+i+'][product_key]" class="form-control" /></td><td><input type="text" name="addmore['+i+'][basic_authentication]" class="form-control" /></td><td><button type="button" class="btn btn-icon btn-icon rounded-circle btn-danger mr-1 mb-1 remove-tr"><i class="feather icon-minus"></i></button></td></tr>');
    });
   $(document).on('click', '.remove-tr', function(){
    --i;
    if (i = 0) return;
         $(this).parents('tr').remove();
    });
</script>



<!-- Ativo Form Input -->
<div class="form-group">
{{ Form::hidden('is_active', '1') }}
</div>
<!-- Submit Form Button -->
<button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">
    Criar
</button>
{!! Form::close() !!}


@endsection