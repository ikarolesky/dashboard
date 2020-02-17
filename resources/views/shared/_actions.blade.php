@can('edit_'.$entity)
    <a href="{{ route($entity.'.edit', [Str::singular($entity) => $id])  }}" class="mb-2 mr-2 btn-transition btn btn-outline-info">
        <i class="metismenu-icon pe-7s-edit" style="font-size: 15px"> Editar</a></i>


{!! Form::open( ['method' => 'put', 'url' => route('users.status', ['user' => $id]), 'style' => 'display: inline', 'onSubmit' => 'return confirm("Quer mesmo desativar este usuário?")']) !!}
{!! Form::hidden('active', '1') !!}
<button type="submit" class="mb-2 mr-2 btn-transition btn btn-outline-success"><i class="metismenu-icon pe-7s-close-circle" style="font-size: 15px">
            Ativar
        </button></i>


{!! Form::close() !!}


{!! Form::open( ['method' => 'put', 'url' => route('users.status2', ['user' => $id]), 'style' => 'display: inline', 'onSubmit' => 'return confirm("Quer mesmo desativar este usuário?")']) !!}
{!! Form::hidden('active', '0') !!}
<button type="submit" class="mb-2 mr-2 btn-transition btn btn-outline-danger"><i class="metismenu-icon pe-7s-close-circle" style="font-size: 15px">
            Desativar
        </button></i>


{!! Form::close() !!}

@endcan
