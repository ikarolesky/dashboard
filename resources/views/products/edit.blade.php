@extends('layouts.app2')
@section('content')

 <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div>Editar Produto: {{ $product->name}}
                                        <div class="page-title-subheading">
                                            <a href="{{ route('products.index') }}" class="mb-2 mr-2 btn-transition btn btn-outline-primary">Voltar</a>
                                        </div>
                                    </div>
                                </div>
                             </div>
                        </div>

                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <div class="card-body">

<div class="result-set">


        <table class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th style="font-size: 18px">Plataformas deste produto</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php
                        $plataformas = App\Product::find($product->id)->plataforms
                        ?>
                        @foreach ($plataformas as $plat)
                        @if ($plat->plataforma_id == '1')
                        <p style="font-size: 18px">Monetizze</p>
                        @endif
                        @if($plat->plataforma_id == '2')
                        <p style="font-size: 18px">PerfectPay</p>
                        @endif
                        @if($plat->plataforma_id == '3')
                        <p style="font-size: 18px">Braip</p>
                        @endif
                        @if(is_null($plataformas))
                        <p style="font-size: 18px">Este produto ainda não tem nenhuma plataforma adicionada</p>
                        @endif
                        @endforeach
                    </td>
                </tr>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        {!! Form::model($product, ['method' => 'PUT', 'route' => ['products.update',  $product->id ] ]) !!}
                                                <!-- Roles Form Input -->
                        <div class="form-group @if ($errors->has('roles')) has-error @endif">
                            {!! Form::label('plataform[]', 'Plataforma') !!}
                            {!! Form::select('plataform[]', $plataform, isset($products) ? $products->plataform->pluck('id')->toArray() : null,  ['class' => 'form-control', 'select']) !!}
                            @if ($errors->has('roles')) <p class="help-block">{{ $errors->first('roles') }}</p> @endif
                            {!! Form::label('product_key', 'Product Key') !!}
                            {!! Form::text('product_key', null, ['class' => 'form-control', ]) !!}
                            {!! Form::label('basic_authentication', 'Basic Authentication') !!}
                            {!! Form::text('basic_authentication', null, ['class' => 'form-control', ]) !!}
                            {!! Form::label('codigo_produto', 'Codigo do Produto') !!}
                            {!! Form::text('codigo_produto', null, ['class' => 'form-control', ]) !!}
                        </div>



                            <!-- Submit Form Button -->
                            {!! Form::submit('Salvar', ['class' => 'mb-2 mr-2 btn-transition btn btn-outline-primary']) !!}
                        {!! Form::close() !!}
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

                        </div>
                    </div>
                    @endsection