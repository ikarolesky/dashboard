@extends('layouts.app3')

@section('title')
Formularios
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
@endsection
@section('breadcrumbs')
                <ol class="breadcrumb ml-1">
                  <li class="breadcrumb-item"><a href="/home">Home</a></li>
                  <li class="breadcrumb-item"><a href="/form">Form</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Novo</li>
                </ol>
@endsection
@section('content')
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
  <div class="card-header">Novo Formulario</div>
    <div class="card">
      <label for="nome">Nome?</label>
      <input id="nome" type="checkbox" class="js-switch">
      <label for="email">Email?</label>
      <input id="email" type="checkbox" class="js-switch1">
      <label for="telefone">Telefone?</label>
      <input id="telefone" type="checkbox" class="js-switch2">
      <label for="select">Selecionar?</label>
      <input id="select" type="checkbox" class="js-switch3">
<form action="{{ Request::url() . '/store' }}" method="post">
<label for="produto">Selecione o Produto</label>
      <select id="produto" name="produto" class="custom-select col-md-6">
      @foreach ($products as $product)
      <option value="{{$product->id}}">{{$product->name}}</option>
      @endforeach
    </select>

    </div>
    <div class="card">
      <div class="card-header">Prévia do Formulário</div>

    <div class="card-body">
        @csrf
        <input type="hidden" name="user_id" value="{{Auth::User()->id}}" id="new-form">

    </div>

  </div>
                              <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">
                                    Adicionar
                                </button>
                            </div>
                        </div>
</div>
<script>let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
let elems1 = Array.prototype.slice.call(document.querySelectorAll('.js-switch1'));
let elems2 = Array.prototype.slice.call(document.querySelectorAll('.js-switch2'));
let elems3 = Array.prototype.slice.call(document.querySelectorAll('.js-switch3'));

elems.forEach(function(html) {
    let switchery = new Switchery(html,  { size: 'small', color: '#7367F0', secondaryColor    : '#e2e2e2' });
});
elems1.forEach(function(html) {
    let switchery = new Switchery(html,  { size: 'small', color: '#7367F0', secondaryColor    : '#e2e2e2' });
});
elems2.forEach(function(html) {
    let switchery = new Switchery(html,  { size: 'small', color: '#7367F0', secondaryColor    : '#e2e2e2' });
});
elems3.forEach(function(html) {
    let switchery = new Switchery(html,  { size: 'small', color: '#7367F0', secondaryColor    : '#e2e2e2' });
});

</script>
<script>$(document).ready(function(){
    $('.js-switch').change(function (){
      let status = $(this).prop('checked') === true ? 1 : 0;
        if (status == 1){
          $("#new-form").append('<label for="nome">Nome</label><br><input id="nome" type="text" name="nome" class="form-group"><br>');
        }
        if (status == 0){
         $(this).parents('input').remove();
         $(this).parents('label').remove();
        }
    });
    $('.js-switch1').change(function (){
      let status = $(this).prop('checked') === true ? 1 : 0;
        if (status == 1){
          $("#new-form").append('<label for="email">Email</label><br><input id="email" type="email" name="email" class="form-group"><br>');
        }
        if (status == 0){
         $(this).parents('input').remove();
         $(this).parents('label').remove();
        }
    });
    $('.js-switch2').change(function (){
      let status = $(this).prop('checked') === true ? 1 : 0;
        if (status == 1){
          $("#new-form").append('<label for="telefone">Telefone</label><br><input id="telefone" type="telefone" name="telefone" class="form-group"><br>');
        }
        if (status == 0){
         $(this).parents('input').remove();
         $(this).parents('label').remove();
        }
    });

    $('.js-switch3').change(function (){
      let status = $(this).prop('checked') === true ? 1 : 0;
      debugger;
        if (status == 1){
          let opt1 = window.prompt('Digite o texto desejado para a primeira opção!');
          let opt2 = window.prompt('Digite o texto desejado para a segunda opção!');
          let opt3 = window.prompt('Digite o texto desejado para a terceira opção!');
          $("#new-form").append('<label for="select">Selecione</label><br><select id="select" class="form-group custom-select"><option value="'+ opt1 +'">' + opt1 +'</option><option value="'+ opt2 +'">' + opt2 +'</option><option value="'+ opt3 +'">' + opt3 +'</option><br>');
        }
        if (status == 0){
         $(this).parents('input').remove();
         $(this).parents('label').remove();
        }
    });

});
</script>
@endsection

