<div class="card my-3">
    <div class="card-header" role="tab" id="{{ isset($title) ? Str::slug($title) :  'permissionHeading' }}">
        <h4 class="mb-0">
            <a role="button" data-toggle="collapse" href="#dd-{{ isset($title) ? Str::slug($title) :  'permissionHeading' }}" aria-expanded="{{ isset($closed) ? 'true' : 'false' }}" aria-controls="dd-{{ isset($title) ? Str::slug($title) :  'permissionHeading' }}">
                {{ $title ?? 'Substituir Permissões' }}
            </a>
        </h4>
    </div>
    <div id="dd-{{ isset($title) ? Str::slug($title) :  'permissionHeading' }}" class="card-collapse collapse" role="tabcard" aria-labelledby="dd-{{ isset($title) ? Str::slug($title) :  'permissionHeading' }}">
        <div class="card-body">
            <div class="row">
                @foreach($permissions as $perm)
                    <?php
                        $per_found = null;

                        if( isset($role) ) {
                            $per_found = $role->hasPermissionTo($perm->name);
                        }

                        if( isset($user)) {
                            $per_found = $user->hasDirectPermission($perm->name);
                        }
                    ?>

                    <div class="col-md-3">
                        <div class="checkbox">
                            <label class="{{ Str::contains($perm->name, 'delete') ? 'text-danger' : '' }}">
                                {!! Form::checkbox("permissions[]", $perm->name, $per_found, isset($options) ? $options : []) !!} {{ $perm->name }}
                            </label>
                        </div>
                    </div>
                @endforeach
                @can('edit_roles')
                <div class="col-md-3">
                {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                </div>
            @endcan
            </div>
        </div>
    </div>
</div>
