@extends('layouts.app3')

@section('title')
Usuários
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
@endsection
@section('breadcrumbs')
                <ol class="breadcrumb ml-1">
                  <li class="breadcrumb-item"><a href="/home">Home</a></li>
                  <li class="breadcrumb-item"><a href="/users">Usuários</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Todos</li>
                </ol>
@endsection
@section('content')
@can('add_users')
<a href="{{ route('create') }}" class="btn btn-primary mr-1 mb-1 waves-effect waves-light"> Novo Usuário</a>
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
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Função</th>
                    <th>Criado em</th>
                    <th class="text-center">Ativo</th>
                    @can('edit_users', 'delete_users')
                    <th class="text-center">Ações</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td scope="row">{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->roles->implode('name', ', ') }}</td>
                    <td>{{ $user->created_at->isoFormat('DD/MM/YY') }}</td>
                    <td class="text-center">
                    @if ($user->roles->contains(function ($value, $key) {
                        return $value->name == "Super Admin";
                    }))
                    @else
                    <input type="checkbox" data-id="{{ $user->id }}" name="status" class="js-switch " {{ $user->status == 1 ? 'checked' : '' }}>
                    @endif
                    </td>
                    @can('edit_users')
                    <td class="text-center">
                        @include('user._actions', [
                            'entity' => 'users',
                            'id' => $user->id
                        ])
                    </td>
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
        let userId = $(this).data('id');
        $.ajax({
            type: "get",
            dataType: "json",
            url: '{{ route('user.status') }}',
            data: {'status': status, 'user_id': userId},
            success: function (data) {
                console.log(data.message);
            }
        });
    });
});
</script>
@endsection

