@extends('layouts.app3')

@section('title')
Formulários
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
@endsection
@section('breadcrumbs')
                <ol class="breadcrumb ml-1">
                  <li class="breadcrumb-item"><a href="/home">Home</a></li>
                  <li class="breadcrumb-item"><a href="/form">Form</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Todos</li>
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
<div table="responsive">
<div class="table-responsive">
<table class="table " id="datatable1">
    <thead>
        <tr>
            <th>Nome do Formulário</th>
            <th>Produto</th>
            <th>URL de Retorno</th>
            <th class="text-center">Código</th>
        </tr>
    </thead>
    <tbody>
    @foreach($forms as $item)
        <tr>
            <td>{{ $item->nome_form }}</td>
            <td>Produto</td>  
            <td>{{ $item->url }}</td>
            <td class="text-center">
<button type="button" class="btn btn-outline-primary btn-lg block" data-toggle="modal" data-target="#xlarge">

              Código do formulário
            </button>

                 <div class="modal fade text-left" id="xlarge" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel16">Código</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
<div class="modal-body">
                    <pre><code>

                      <p>{{'<form action="'}}{{Request::url() . '/sub'}}{{'" method="post">'}}</p><p>{{'<input type="hidden" value="'}}{{Auth::user()->id}}{{'" name="user_id" id="user_id" class="form-group">'}}</p><p>{{$item->conteudo1}}</p><p>{{$item->conteudo2}}</p><p>{{$item->conteudo3}}<p><p>{{'<input type="hidden" value="'}}{{$item->url}}{{'" name="url" id="url" class="form-group">'}}</p><p>{{'<input type="hidden" value="'}}{{$item->id}}{{'" name="form_id" id="form_id" class="form-group">'}}</p>{{$item->conteudo4}}</p><p>{{'<button type="submit" class="btn btn-primary">Enviar</button>'}}</p>
                    </pre></code>
                    </p>
                  </div>
                  <div class="modal-footer">
                    Copie o código acima e cole no site desejado!
                  </div>
                      </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
</div>


@endsection

