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
<form action="{{ route('forms.store') }}" method="post">
  @csrf

<div class="row">
<div class="col-lg-6 col-md-12 col-sm-12">
  <div class="card-header">Novo Formulario</div>
    <div class="card">
      <div>
<label for="nome_form">Nome do Formulário</label><br>
<input type="text" id="nome_form" name="nome_form" class="col-md-6"><br><br>
<label for="produto">Selecione o Produto</label><br>
      <select id="produto" name="produto" class="custom-select col-md-6">
      @foreach ($products as $product)
      <option value="{{$product->name}}">{{$product->name}}</option>
      @endforeach
    </select>
</div>
<br>
      <label for="url">URL para redirecionamento</label>
      <input id="url" name="url" type="text" class="col-md-6 form-group"><br>
      <label for="whatsapp">Mensagem do WhatsApp</label>
      <input id="whatsapp" name="whatsapp" type="text" class="col-md-6 form-group"><br>
      <label for="nome">Nome?</label>
      <input id="nome" type="checkbox" class="js-switch">
      <label for="email">Email?</label>
      <input id="email" type="checkbox" class="js-switch1">
      <label for="telefone">Telefone?</label>
      <input id="telefone" type="checkbox" class="js-switch2">
      <label for="select">Selecionar?</label>
      <input id="select" type="checkbox" class="js-switch3">
      <label for="select">Opção 1</label>
      <input id="select" type="checkbox" class="js-switch4">
      <label for="select">Opção 2</label>
      <input id="select" type="checkbox" class="js-switch5">
      <label for="select">Opção 3</label>
      <input id="select" type="checkbox" class="js-switch6">
</div>
<div class="col-lg-3 col-md-6 col-12">
</div>

<br>

                              <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-0">
                                <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">
                                    Adicionar
                                </button>
                            </div>
                        </div>
    </div>
    <div class="card">
      <div class="card-header"></div>

    <div class="card-body" id="new-form">
        <input type="hidden" name="user_id" value="{{Auth::User()->id}}" id="new-form">

    </div>

  </div>

</div>
</div>
<script src="/app-assets/js/scripts/formbuilder/formswitch.js"></script>
<script src="/app-assets/js/scripts/formbuilder/formadd.js"></script>
@endsection

