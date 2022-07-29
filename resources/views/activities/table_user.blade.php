<div class="table-responsive">
    <table class="table" id="workshops-table">
        <thead>
        <tr>
            <th>Nombre</th>
        <th>Descripción</th>
        <th>Responsable</th>
        <th>Fecha Inicio</th>
        <th>Fecha Fin</th>
        <th>Precio</th>
        <th>Tipo de Actividad</th>
        <th>estado</th>
        
        @can('activities.edit')<th colspan="3">Acciones</th>@endcan
        </tr>
        </thead>
        <tbody>
        @foreach($workshops_user as $workshop)
            <tr>
                <td>{{ $workshop->name_workshop }}</td>
            <td>{{ $workshop->description_workshop }}</td>
            <td>{{ $workshop->teacher}}</td>
            <td>{{ $workshop->start }}</td>
            <td>{{ $workshop->end }}</td>
            <td>${{ $workshop->price }}</td>
            <td>{{ $workshop->name_categorie }}</td>
            <td>{{ $workshop->state }}</td>
            
            @can('activities.edit')<td width="120">
                    {!! Form::open(['route' => ['activities.destroy', $workshop->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('activities.show', [$workshop->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        @can('activities.edit')<a href="{{ route('activities.edit', [$workshop->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>@endcan
                        </a>
                        @can('activities.destroy')
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿estas seguro?')"]) !!}
                        @endcan
                    </div>
                    {!! Form::close() !!}
                </td>@endcan
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
