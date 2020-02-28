<table class="table table-bordered" id="dynamicTable">
    <tr>
        <th>Plataforma</th>
        <th>Código do Produto</th>
        <th>Chave de Autenticação</th>
        <th>Chave do Produto</th>
        <th></th>
    </tr>
    <tr>
        <td><select id="plataforma" name="addmore[0][plataforma]" placholder="Plataforma" class="form-control"/>
            @foreach ($plataforma as $plat)
        	<option value="{{$plat->id}}">{{$plat->name}}</option>
            @endforeach
        </select>
        </td>
        <td><input type="text" name="addmore[0][codigo_produto]" class="form-control" /></td>
        <td><input type="text" name="addmore[0][basic_authentication]" class="form-control" /></td>
        <td><input type="text" name="addmore[0][product_key]" class="form-control" /></td>
        <td><button type="button" name="add" id="add" class="btn btn-icon btn-icon rounded-circle btn-success mr-1 mb-1"><i class="feather icon-plus"></i></button></td>
    </tr>
</table>
<script
  src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
  crossorigin="anonymous"></script>
<script type="text/javascript">
    var i = 0;
    $("#add").click(function(){
        if (i >= 2) return;
        ++i;
        $("#dynamicTable").append('<tr><td><select id="plataforma" name="addmore['+i+'][plataforma]" class="form-control">@foreach($plataforma as $plat)<option value="{{$plat->id}}">{{$plat->name}}</option>@endforeach</select></td><td><input type="text" name="addmore['+i+'][codigo_produto]" class="form-control" /></td><td><input type="text" name="addmore['+i+'][product_key]" class="form-control" /></td><td><input type="text" name="addmore['+i+'][basic_authentication]" class="form-control" /></td><td><button type="button" class="btn btn-icon btn-icon rounded-circle btn-danger mr-1 mb-1 remove-tr"><i class="feather icon-minus"></i></button></td></tr>');
    });
   $(document).on('click', '.remove-tr', function(){
         $(this).parents('tr').remove();
    });
</script>


