@extends('layouts.app3')
@section('title')
{{$leads->nome}}
@endsection
@section('breadcrumbs')
                <ol class="breadcrumb ml-1">
                  <li class="breadcrumb-item"><a href="/home">Home</a></li>
                  <li class="breadcrumb-item"><a href="/cards">Leads</li></a>
                  <li class="breadcrumb-item active" aria-current="page">Editar: {{$leads->nome}}</li>
                </ol>
@endsection
@section('content')
<div class="card-body">
<a href="{{ route('leads.index') }}" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Voltar</a>
    <div class="table-responsive">
    	<table class="table">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>WhatsApp</th>
        </tr>
    </thead>
    <tbody>
    	<tr>
    		<td>{{$leads->nome}}</td>
    		<td>{{$leads->telefone}}</td>
    		@if(in_array($leads->forms_id, $forms->pluck('id')->toArray()))
            <td><a href="{{ 'https://api.whatsapp.com/send?phone=55' . $leads->telefone . '&text=' . $forms->where('id', $leads->forms_id)->first()->whatsapp  }}" class="btn btn-icon btn-icon rounded-circle btn-success mr-1 mb-1"><i class="feather icon-message-circle"></i></a>
            @endif</td>

    	</tr>
    </tbody>
</table>
    <div class="table-responsive">
           <div class="form-group">
            {!! Form::model($leads, ['method' => 'PUT', 'route' => ['leads.update',  $leads->id ] ]) !!}
                <label for="observacao">Observação</label>
                            <input id="observacao" class="form-control" type="text-area" name="observacao">
                <label for="status">Status</label>
                            <select id="status" name="status" type="status" required class="custom-select">
                                <option value="Atender">Atender</option>
                                <option value="Atendido">Atendido</option>
                                <option value="Em Atendimento">Em Atendimento</option>
                        	</select>
                </label>
            </div>
            <!-- Submit Form Button -->
            <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">
                Salvar
            </button>
            {!! Form::close() !!}
    </div>
</div>
@endsection
