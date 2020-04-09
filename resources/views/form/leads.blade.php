@extends('layouts.app3')

@section('title')
Leads
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
@endsection
@section('breadcrumbs')
                <ol class="breadcrumb ml-1">
                  <li class="breadcrumb-item"><a href="/home">Home</a></li>
                  <li class="breadcrumb-item"><a href="/form">Leads</a></li>
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
<table class="table row-grouping">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Nome do Formulário</th>
            <th>WhatsApp</th>
        </tr>
    </thead>
    <tbody>
        @foreach($leads as $lead)
        <tr>
            <td>{{$lead->nome}}</td>
            <td>{{$lead->telefone}}</td>
            <td>@if(in_array($lead->forms_id, $forms->pluck('id')->toArray()))
                    {{$forms->where('id', $lead->forms_id)->first()->nome_form}}
                @endif
            </td>
            @if(in_array($lead->forms_id, $forms->pluck('id')->toArray()))
            <td><a href="{{ 'https://api.whatsapp.com/send?phone=55' . $lead->telefone . '&text=' . $forms->where('id', $lead->forms_id)->first()->whatsapp  }}" class="btn btn-icon btn-icon rounded-circle btn-warning mr-1 mb-1">
            @endif
       <i class="feather icon-edit"></i></a>
        </tr>
          @endforeach
    </tbody>
</table>
</div>
</div>

<script>
    function copyToClipboard() {
                    var range = document.createRange();
                    range.selectNode(document.getElementById("copycode"));
                    window.getSelection().removeAllRanges();
                    window.getSelection().addRange(range);
                    document.execCommand("copy");
                    window.getSelection().removeAllRanges();
                }
</script>
@endsection



