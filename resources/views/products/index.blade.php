@extends('layouts.app3')

@section('title')
Produtos
@endsection
@section('content')
                                <div class="page-title-heading">
                                    <div>Produtos
                                        <div class="page-title-subheading"><a href="{{ route('products.create') }}" class="mb-2 mr-2 btn-transition btn btn-outline-primary"> Novo Produto</a>
                                        </div>
                                    </div>
                                </div>
                             </div>
                        </div>
        <table id="datatable1" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>Nome</th>
                <th>URL</th>
                <th>Plataformas</th>
                <th>Criado em</th>
                <th>Editado em</th>
                <th>Ativo</th>
                <th>Ações</th>

            </tr>
            </thead>
            <tbody>
            @foreach($products as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->url }}</td>
                    <td>
                        <?php
                        $plataformas = App\Product::find($item->id)->plataforms
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
                        @endforeach
                    </td>
                    <td>{{ $item->created_at->isoFormat('ddd, DD  MMM YYYY h:mm:ss a') }}</td>
                    <td>{{ $item->updated_at->isoFormat('ddd, DD  MMM YYYY h:mm:ss a') }}</td>
                    @if ($item->is_active == 1)
                    <td>Sim</td>
                    @elseif ($item->is_active == 0)
                    <td>Não</td>
                    @endif
                    <td class="text-center">
                        @include('products._actions', [
                            'entity' => 'products',
                            'id' => $item->id
                        ])
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>




@endsection