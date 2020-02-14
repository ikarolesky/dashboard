@can('edit_'.$entity)
    <a href="{{ route($entity.'.edit', [Str::singular($entity) => $id])  }}" class="mb-2 mr-2 btn-transition btn btn-outline-info">
        <i class="metismenu-icon pe-7s-edit" style="font-size: 15px"> Editar</a></i>
@endcan

@can('delete_'.$entity)
    {!! Form::open( ['method' => 'delete', 'url' => route($entity.'.destroy', ['user' => $id]), 'style' => 'display: inline', 'onSubmit' => 'return confirm("Are yous sure wanted to delete it?")']) !!}
        <button type="submit" class="mb-2 mr-2 btn-transition btn btn-outline-danger"><i class="metismenu-icon pe-7s-close-circle" style="font-size: 15px">
            Deletar
        </button></i>
    {!! Form::close() !!}
@endcan
