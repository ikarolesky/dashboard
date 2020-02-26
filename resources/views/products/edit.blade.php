@extends('layouts.app3')
@section('tittle')
Editar Produtos
@endsection
@section('content')
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    Editar Produto: {{ $product->name}}
                                        <div class="page-title-subheading">
                                            <a href="{{ route('products.index') }}" class="mb-2 mr-2 btn-transition btn btn-outline-primary">Voltar</a>
                                        </div>
                                </div>
                            </div>
<div class="table-responsive">
 <table class="table table-hover-animation mb-0">
            <thead>
            <tr>
                <th>Plataformas deste produto</th>
            </tr>
            </thead>
            <tbody class="table-hover-animation">
                <tr>
                    <td>
                        <?php
                        $plataformas = App\Product::find($product->id)->plataforms
                        ?>
                        @foreach ($plataformas as $plat)
                        @if ($plat->plataforma_id == '1')
                        <p>Monetizze</p>
                        @endif
                        @if($plat->plataforma_id == '2')
                        <p>PerfectPay</p>
                        @endif
                        @if($plat->plataforma_id == '3')
                        <p>Braip</p>
                        @endif
                        @if(is_null($plataformas))
                        <p>Este produto ainda não tem nenhuma plataforma adicionada</p>
                        @endif
                        @endforeach
                    </td>
                </tr>
            </tbody>
</table>            

                        {!! Form::model($product, ['method' => 'PUT', 'route' => ['products.update',  $product->id ] ]) !!}
                        <div class="form-group @if ($errors->has('roles')) has-error @endif">
                            {!! Form::label('plataform[]', 'Plataforma') !!}
                            {!! Form::select('plataform[]', $plataform, isset($products) ? $products->plataform->pluck('id')->toArray() : null,  ['class' => 'form-control', 'select']) !!}
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
</div>                        
@endsection