@can('edit_'.$entity)
    <a href="{{ route($entity.'.edit', [Str::singular($entity) => $id])  }}" class="btn btn-icon btn-icon rounded-circle btn-warning mr-1 mb-1">
       <i class="feather icon-edit"></i></a>
@endcan
