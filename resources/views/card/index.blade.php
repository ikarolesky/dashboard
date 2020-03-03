@extends('layouts.app3')

@section('title')
Cartões
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
@endsection
@section('breadcrumbs')
                <ol class="breadcrumb ml-1">
                  <li class="breadcrumb-item"><a href="/home">Home</a></li>
                  <li class="breadcrumb-item"><a href="/cards">Cartões</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Todos</li>
                </ol>
@endsection
@section('content')
@can('add_posts')
<a href="{{ route('cards.create') }}" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Novo Cartão</a>
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
<div class="card">
<div table="responsive">
<div class="table-responsive">
<table class="table" id="datatable1" >
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Banco</th>
                    <th>6 Dígitos</th>
                    <th>Saldo</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Gerenciar Saldo</th>
                    @can('edit_posts', 'delete_posts')
                    <th class="text-center">Ações</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
            @foreach($cards as $card)
                <tr>
                    <td scope="row">{{ $card->id }}</td>
                    <td>
                        @if ($card->cartao_banco_id == '1')
                        <p>PagCorp</p>
                        @endif
                        @if($card->cartao_banco_id == '2')
                        <p>PayPal</p>
                        @endif
                        @if($card->cartao_banco_id == '3')
                        <p>NuBank</p>
                        @endif
                        <h6> {{ $card->tipo}}</h6>
                    </td>
                    <td>{{ $card->digitos }}</td>
                    <td class="teste">{{ $card->saldo }}</td>
                    <td class="text-center">
                    <input type="checkbox" data-id="{{ $card->id }}" name="status" class="js-switch " {{ $card->status == 1 ? 'checked' : '' }}>
                    </td>
                    @can('edit_users')
                    <td class="text-center">
                        @include('card._actions', [
                            'id' => $card->id
                        ])
                    </td>
                    <td class="text-center">
                        @include('card._edit', [
                            'entity' => 'cards',
                            'id' => $card->id
                        ])
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>
</div>
</div>
</div>
<script>let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
    let switchery = new Switchery(html,  { size: 'small', color: '#7367F0', secondaryColor    : '#e2e2e2' });
});</script>
<script>$(document).ready(function(){
    $('.js-switch').change(function () {
        let status = $(this).prop('checked') === true ? 1 : 0;
        let cardId = $(this).data('id');
        $.ajax({
            type: "get",
            dataType: "json",
            url: '{{ route('card.status') }}',
            data: {'status': status, 'cartao_id': cardId},
            success: function (data) {
                console.log(data.message);
            }
        });
    });
});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/app-assets/js/scripts/moneymask/money.mask.js"></script>
<script>
$(document).ready(function($){
$('.teste').mask('000.000.000.000.000,00', {reverse: true});
});
</script>
@endsection
