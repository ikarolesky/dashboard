@extends('layouts.app2')
@section('content')
 <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-add-user icon-gradient bg-mean-fruit">
                                        </i>
                                    </div>
                                <div class="page-title-heading">
                                    <div>Novo usuário
                                        <div class="page-title-subheading">
                                            <a href="{{ route('users.index') }}" class="mb-2 mr-2 btn-transition btn btn-outline-primary">Voltar</a>

                                        </div>
                                    </div>
                                </div>
                             </div>
                        </div> 
                        <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                            <li class="nav-item">
                                <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                                    <span>?</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
                                    <span>!</span>
                                </a>
                            </li>
                        </ul>

                        <div class="main-card mb-3 card">
@hasanyrole('Super Admin|admin')

        <div class="col-md-12">

                <div class="card-body">
                    <form method="POST" action="{{ route('user.add') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <input type="hidden" id="active" name="active" value="1">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar Senha</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                            <div class="form-group row">
                            
                                <label for="role" class="col-md-4 col-form-label text-md-right">Função</label>
                                <div class="col-md-6">
                                <select id="role" name="role" type="role" required class="mb-2 mr-2 dropdown-toggle btn btn-primary">
                                    <option></option>
                                    <option value="admin">Administrador</option>
                                    <option value="user">Usuário</option>
                                </select>
                            </div></div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Adicionar
                                </button>
        </main>
    </div>
@else
<div class="main-card mb-3 card">

                <div class="card-body">
                    Você não possui permissões
                </div>
@endrole

                        </div>
</div>

@endsection