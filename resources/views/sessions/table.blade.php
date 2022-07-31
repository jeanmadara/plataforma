<div class="table-responsive">
    <table class="table" id="sessions-table">
        <thead>
        <tr>
            <th>Nombre del Curso</th>
        <th>Descripción</th>
        <th>Fecha Inicio</th>
        <th>Fecha Fin</th>
        <th>Precio</th>
        
        <th>ver sesiones</th>
        <th>añadir sesiones</th>
        @can('workshops.create')<th colspan="3">Acciones</th>@endcan
        </tr>
        </thead>
        <tbody>
        @foreach($workshops as $workshop)
            <tr>
                <td>{{ $workshop->name_workshop }}</td>
            <td>{{ $workshop->description_workshop }}</td>
            <td>{{ $workshop->start }}</td>
            <td>{{ $workshop->end }}</td>
            <td>${{ $workshop->price }}</td>
            
            <td>
                    <a class="btn btn-info" href="{{ route('sessionlist', [$workshop->workshop_id]) }}">Ver sesiones</a>
            </td>
            <td>    
                    <a class="btn btn-info" href="{{ route('addsessions', [$workshop->workshop_id]) }}">añadir sesion</a>
                    
                </td>
                <td width="120">
                    {!! Form::open(['route' => ['sessions.destroy', $workshop->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('sessions.show', [$workshop->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('sessions.edit', [$workshop->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
