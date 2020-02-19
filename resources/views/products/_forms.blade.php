<!-- Name Form Input -->
<div class="form-group ">
    {!! Form::label('nome', 'Nome do produto') !!}
    {!! Form::text('nome', null, ['class' => 'form-control', 'placeholder' => 'Peel Gold']) !!}
</div>

<!-- URL Form Input -->
<div class="form-group">
    {!! Form::label('url', 'URL do produto') !!}
    {!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'www.peelgold.com.br']) !!}
</div>

@include('products._forms2')

<!-- Ativo Form Input -->
<div class="form-group">
{{ Form::hidden('is_active', '1') }}
</div>



