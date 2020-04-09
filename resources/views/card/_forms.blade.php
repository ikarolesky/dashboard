<!-- Banco Form Input -->
<div class="form-group ">
	<label for="cartao_banco_id">Banco</label>
		<select id="cartao_banco_id" name="cartao_banco_id" type="cartao_banco_id" required class="custom-select">
			<option>Selecione</option>
			@foreach ($bancos as $banco)
			<option value="{{$banco->id}}">{{$banco->nome}}</option>
			@endforeach
		</select>
</div>

<!-- Tipo Form Input -->
<div class="form-group ">
	<label for="tipo">Tipo do cartão</label>
		<select id="tipo" name="tipo" required class="custom-select">
			<option>Selecione</option>
			<option value="Pré-pago">Pré-pago</option>
			<option value="Crédito">Crédito</option>
		</select>
</div>

<!-- 6Dígitos Form Input -->
<div class="form-group">
    <label for="digitos">6 Dígitos</label>
		<input id="digitos" class="form-control" type="integer" name="digitos" placeholder="49 8512" maxlength="7">
</div>

<!-- Saldo Form Input -->
<div class="form-group">
    <label for="saldo">Saldo R$</label>
		<input id="saldo" class="form-control" type="text" name="saldo" placeholder="150" data-symbol="R$">
</div>

<!-- Ativo Form Input -->
<div class="form-group">
{{ Form::hidden('status', '1') }}
</div>
<!-- Submit Form Button -->
<button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">
    Criar
</button>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
$(document).ready(function($){


$('#digitos').mask("00 0000");
});
</script>




