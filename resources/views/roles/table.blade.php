<div class="table-responsive">
    <table class="table" id="categories-table">
        <thead>
        <th>Rol</th>
        <th>Acciones</th>
        </thead>  
        </thead>
        <tbody>
        @foreach ($roles as $role)
                                <tr>                           
                                    <td>{{ $role->name }}</td>
                                    <td>                                
                                        @can('roles.edit')
                                            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Editar</a>
                                        @endcan
                                        
                                       @can('roles.destroy')
                                            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                                {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
        @endforeach
        </tbody>
    </table>
</div>


