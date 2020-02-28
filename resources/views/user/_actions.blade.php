@if ($user->roles->contains(function ($value, $key) {
    return $value->name == "Super Admin";
}))
@can('edit_'.$entity)
    <a href="{{ route($entity.'.edit', [Str::singular($entity) => $id])  }}" class="btn btn-icon btn-icon rounded-circle btn-warning mr-1 mb-1">
       <i class="feather icon-edit"></i></a>
@endcan

@else
@can('edit_'.$entity)
    <a href="{{ route($entity.'.edit', [Str::singular($entity) => $id])  }}" class="btn btn-icon btn-icon rounded-circle btn-warning mr-1 mb-1">
       <i class="feather icon-edit"></i></a>


{!! Form::open( ['method' => 'put', 'url' => route('users.status', ['user' => $id]), 'style' => 'display: inline', 'onSubmit' => 'return confirm("Quer mesmo desativar este usuário?")']) !!}
{!! Form::hidden('active', '1') !!}
<button type="submit" class="btn btn-icon btn-icon rounded-circle btn-success mr-1 mb-1"><i class="feather icon-check"></i>
</button>


{!! Form::close() !!}


{!! Form::open( ['method' => 'put', 'url' => route('users.status2', ['user' => $id]), 'style' => 'display: inline', 'onSubmit' => 'return confirm("Quer mesmo desativar este usuário?")']) !!}
{!! Form::hidden('active', '0') !!}
<button type="submit" class="btn btn-icon btn-icon rounded-circle btn-danger mr-1 mb-1"><i class="feather icon-x"></i>
</button>


{!! Form::close() !!}
@endcan
@endif