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
<div class="card-body">
<a href="{{ route('products.index') }}" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Voltar</a>

                            <?php
                            $plataformas = App\Product::find($product->id)->plataforms
                            ?>

            {!! Form::model($product, ['method' => 'PUT', 'route' => ['products.update',  $product->id ] ]) !!}
        <div class="form-group">
                    <label for="name">Nome do Produto</label>
                        <input id="name" type="text" name="name" value="{{$product->name}}" class="form-control">
                        <input hidden id="hname" type="text" name="hname" value="{{$product->name}}" class="form-control">
        </div>
        <div class="form-group">
                    <label for="url">URL</label>
                        <input id="url" type="text" name="url" value="{{$product->url}}" class="form-control">
        </div>
<div class="form-group">
<table class="table table-bordered" id="dynamicTable">
    <tr>
        <th>Plataforma</th>
        <th>Código do Produto</th>
        <th>Chave do Produto</th>
        <th>Chave de Autenticação</th>
        <th class="text-center"><button type="button" name="add" id="add" class="btn btn-icon btn-icon rounded-circle btn-success mr-1 mb-1"><i class="feather icon-plus"></i></button></th>
    </tr>
    @foreach ($plataformas->chunk(1) as $a)
                @foreach($a as $b)
                <tr>
                    @if(in_array($b->plataforma_id, $plataform->pluck('id')->toArray()))
                <td>
                <p>{{$plataform->where('id', $b->plataforma_id)->first()->name}}</p>
                </td>
                <td><input type="text" name="addmore1[{{$b->plataforma_id}}][codigo_produto]" value="{{$b->codigo_produto}}" class="form-control"></td>
                <td><input type="text" name="addmore1[{{$b->plataforma_id}}][product_key]" value="{{$b->product_key}}" class="form-control" ></td>
                <td><input type="text" name="addmore1[{{$b->plataforma_id}}][basic_authentication]" value="{{$b->basic_authentication}}" class="form-control"></td>
                <td class="text-center"><button type="button" data-cp="{{$b->codigo_produto}}" data-ba="{{$b->basic_authentication}}" data-pk="{{$b->product_key}}" data-pi="1" class="btn btn-icon btn-icon rounded-circle btn-danger mr-1 mb-1 delete-tr"><i class="feather icon-x"></i></button></td>
                <input type="hidden" name="addmore1[{{$b->plataforma_id}}][plataforma_id]" value="1">
                </tr>
                @endif

                @endforeach
            @endforeach

</div>
</table>
            <!-- Submit Form Button -->
            <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">
                Salvar
            </button>
            {!! Form::close() !!}
<script
  src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
  crossorigin="anonymous"></script>
<script type="text/javascript">
    var i = 0;
    $("#add").click(function(){
        if (i >= 2) return;
        i+=1;
        $("#dynamicTable").append('<tr><td><select id="plataforma_id" name="addmore['+i+'][plataforma_id]" class="form-control">@foreach($plataform as $plat)<option value="{{$plat->id}}">{{$plat->name}}</option>@endforeach</select></td><td><input type="hidden"  name="addmore['+i+'][product_id]" value="{{$product->id}}" ><input type="text" name="addmore['+i+'][codigo_produto]" class="form-control" /></td><td><input type="text" name="addmore['+i+'][product_key]" class="form-control" /></td><td><input type="text" name="addmore['+i+'][basic_authentication]" class="form-control" /></td><td class="text-center"><button type="button" class="btn btn-icon btn-icon rounded-circle btn-danger mr-1 mb-1 remove-tr"><i class="feather icon-minus"></i></button></td></tr>');
    });
   $(document).on('click', '.remove-tr', function(){
    if (i == 0) return;
    i-=1;
         $(this).parents('tr').remove();
    });
</script>
<script>
    //DELETA O PRODUTO JÁ ADICIONADO SEM ATT A PÁGINA.
    $(document).on('click', '.delete-tr', function(){
        let product_key = $(this).data('pk');
        let basic_authentication = $(this).data('ba');
        let codigo_produto = $(this).data('cp');
        let plataforma_id = $(this).data('pi');
        $.ajax({
            type: "get",
            dataType: "json",
            url: '{{ route('products.delete') }}',
            data: {'product_key': product_key, 'basic_authentication': basic_authentication, 'codigo_produto': codigo_produto, 'plataforma_id': plataforma_id },
            success: $(this).parents('tr').remove(),
            });
        });
</script>


</div>
@endsection
