<!-- Name Form Input -->
<div class="form-group ">
    {!! Form::label('name', 'Nome') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}
</div>

<!-- email Form Input -->
<div class="form-group">
    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
</div>

<!-- password Form Input -->
<div class="form-group">
    {!! Form::label('password', 'Senha') !!}
    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Senha']) !!}
</div>

@can('edit_user')
@if ($user->roles('id') == '1')
<!-- Roles Form Input -->
<div class="form-group @if ($errors->has('roles')) has-error @endif">
    {!! Form::label('roles[]', 'Roles') !!}
    {!! Form::select('roles[]', $roles, isset($user) ? $user->roles->pluck('id')->toArray() : null,  ['class' => 'form-control', 'select']) !!}
    @if ($errors->has('roles')) <p class="help-block">{{ $errors->first('roles') }}</p> @endif
</div>

<!-- Telefone Form Input -->
<div class="form-group">
    {!! Form::label('phone', 'Telefone') !!}
    {!! Form::text('phone', null, ['class' => 'form-control cel-sp-mask', 'placeholder' => 'Telefone']) !!}
</div>

<!-- Endereço Form Input -->
<div class="form-row align-items-center form-group">
    <div class="col-sm-7 my-1">
    {!! Form::label('address', 'Endereço') !!}
    {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Rua São Pedro']) !!}

</div>
<div class="col-sm-1 my-1">
<!-- Número Form Input -->
    {!! Form::label('address_number', 'Nº') !!}
    {!! Form::text('address_number', null, ['class' => 'form-control', 'placeholder' => '71']) !!}
</div>
<div class="col-sm-2 my-1">
<!-- Complemento Form Input -->
    {!! Form::label('address_comp', 'Complemento') !!}
    {!! Form::text('address_comp', null, ['class' => 'form-control', 'placeholder' => 'Casa 3']) !!}
</div>
<div class="col-sm-2 my-1">
<!-- Bairro Form Input -->
    {!! Form::label('address_district', 'Bairro') !!}
    {!! Form::text('address_district', null, ['class' => 'form-control', 'placeholder' => 'Zona 7']) !!}
</div>
</div>

<!-- CEP Form Input -->
<div class="form-group">
    {!! Form::label('address_zip', 'CEP') !!}
    {!! Form::text('address_zip', null, ['class' => 'form-control cep-mask', 'placeholder' => '87030-210']) !!}
</div>

<!-- Cidade Form Input -->
<div class="form-group @if ($errors->has('address_zip')) has-error @endif">
    {!! Form::label('address_city', 'Cidade') !!}
    {!! Form::text('address_city', null, ['class' => 'form-control', 'placeholder' => 'Maringá']) !!}
</div>

<!-- Estado Form Input -->
<div class="form-group @if ($errors->has('address_zip')) has-error @endif">
    {!! Form::label('address_state', 'Estado') !!}
    {!! Form::text('address_state', null, ['class' => 'form-control', 'placeholder' => 'Paraná']) !!}
</div>


@endif







@endcan