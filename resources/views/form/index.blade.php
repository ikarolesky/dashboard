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
@can('add_posts')
<a href="{{ route('forms.create') }}" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Novo Formulário</a>
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
<table class="table">
    <thead>
        <tr>
            <th>Nome do Formulário</th>
            <th>Produto</th>
            <th>URL de Retorno</th>
            <th>Criado em </th>
            <th class="text-center">Código</th>
        </tr>
    </thead>
    <tbody>
    @foreach($forms as $item)
        <tr>
            <td>{{ $item->nome_form }}</td>
            <td>{{$item->produto}}</td>  
            <td>{{ $item->url }}</td>
            <td>{{ $item->created_at->isoFormat('DD/MM/YY') }}</td>
            <td class="text-center">
<button type="button" class="btn btn-outline-primary btn-lg block" data-toggle="modal" data-target="#{{'f' . $item->id}}">

              Código do formulário
            </button>

                 <div class="modal fade text-left" id="{{'f' . $item->id}}" tabindex="-1" role="dialog"
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
                      Cole na tag <h6>head</h6> da sua página:
                        <pre><code id="copyhead">
{{'<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://kings7.digital/app-assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://kings7.digital/app-assets/css/bootstrap-extended.min.css">' }}
</code></pre>
                      Cole no final da tag <h6>body</h6> da sua pagina:
                      <pre><code id="copybody">
{{'<script async="" src="https://www.google-analytics.com/analytics.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="https://assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
<script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>'}}
</code></pre>
                    Formulário
                    <pre><code id="copycode"><p>{{'<form action="'}}{{Request::url() . '/sub'}}{{'" method="post">'}}</p><p>{{'<input type="hidden" value="'}}{{Crypt::encrypt($item->user_id)}}{{'" name="user_id" id="user_id" class="form-group">'}}</p><p>{{$item->conteudo1 . '<br>'}}</p><p>{{$item->conteudo2 . '<br>'}}</p><p>{{$item->conteudo3 . '<br>'}}<p><p>{{'<input type="hidden" value="'}}{{$item->url}}{{'" name="url" id="url" class="form-group">'}}</p><p>{{'<input type="hidden" value="'}}{{Crypt::encrypt($item->id)}}{{'" name="form_id" id="form_id" class="form-group">'}}</p>{{$item->conteudo4}}{{$item->conteudo5}}{{$item->conteudo6}}{{$item->conteudo7}}{{'</select>'}}</p></p><p>{{'<p></p>' . '<button type="submit" class="btn btn-primary">Enviar</button>'}}</p>
                    </code></pre>
                    </p>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-primary mr-1 mb-1 waves-effect waves-light" onclick="copyToClipboard1('copyhead')">Copiar head!</button>
                    <button class="btn btn-primary mr-1 mb-1 waves-effect waves-light" onclick="copyToClipboard2('copybody')">Copiar body!</button>
                    <button class="btn btn-primary mr-1 mb-1 waves-effect waves-light" onclick="copyToClipboard('copycode')">Copiar formulário!</button>
                  </div>
                      </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
</div>
<script src="/app-assets/js/scripts/formbuilder/copy.js"></script>
@endsection



