@extends('layouts.app2')

@section('content')
<div class="app-main__outer">

    <div class="app-main__inner">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="João da Silva">

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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="exemplo@exemplo.com">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Telefone</label>

                            <div class="col-md-6">
                                <input id="phone" class="form-control cel-sp-mask" type="text" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus placeholder="(99)99999-9999">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="doc" class="col-md-4 col-form-label text-md-right">Documento(CPF/CNPJ)</label>

                            <div class="col-md-6">
                                <input id="doc" class="form-control" type="text" name="doc" placeholder="012.345.678-90 / 01.234.567.0001-00">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Rua/Avenida</label>

                            <div class="col-md-6">
                                <input id="address" class="form-control" type="text" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus placeholder="Rua Maringá">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address_number" class="col-md-4 col-form-label text-md-right">Número</label>

                            <div class="col-md-6">
                                <input id="address_number" class="form-control" type="text" name="address_number" value="{{ old('address_number') }}" required autocomplete="address_number" autofocus placeholder="9999">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address_comp" class="col-md-4 col-form-label text-md-right">Complemento</label>

                            <div class="col-md-6">
                                <input id="address_comp" class="form-control" type="text" name="address_comp" value="{{ old('address_comp') }}" autocomplete="address_comp" autofocus placeholder="Sala 3">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address_district" class="col-md-4 col-form-label text-md-right">Bairro</label>

                            <div class="col-md-6">
                                <input id="address_district" class="form-control" type="text" name="address_district" value="{{ old('address_district') }}" required autocomplete="address_district" autofocus placeholder="Zona 7">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address_zip" class="col-md-4 col-form-label text-md-right">CEP</label>

                            <div class="col-md-6">
                                <input id="address_zip" class="form-control cep-mask" type="text" name="address_zip" value="{{ old('address_zip') }}" required autocomplete="address_zip" autofocus placeholder="12345-000">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address_city" class="col-md-4 col-form-label text-md-right">Cidade</label>

                            <div class="col-md-6">
                                <input id="address_city" class="form-control" type="text" name="address_city" value="{{ old('address_city') }}" required autocomplete="address_city" autofocus placeholder="Maringá">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address_state" class="col-md-4 col-form-label text-md-right">Estado</label>

                            <div class="col-md-6">
                                <input id="address_state" class="form-control" type="text" name="address_state" value="{{ old('address_state') }}" required autocomplete="address_state" autofocus placeholder="Paraná">

                            </div>
                        </div>

                        <div class="form-row align-items-center">
                            <label for="subdomain" class="col-md-4 col-form-label text-md-right">URL</label>

                            <div class="col-md-3 my-2">
                                <input id="subdomain" class="form-control" type="text" name="subdomain" placeholder="fantasia">
                            </div>
                            <div class="col-md-3 my-1">
                            <input class="form-control" id="disabledInput" type="text" placeholder=".kings7.com.br" disabled>
                        </div>
                    </div>
                    <p></p>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <input type="hidden" id="company" name="company" value="1">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
