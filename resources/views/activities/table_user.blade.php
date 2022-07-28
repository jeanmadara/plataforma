<div class="table-responsive">
    <table class="table" id="workshops-table">
        <thead>
        <tr>
            <th>Nombre</th>
        <th>Descripción</th>
        <th>Docente</th>
        <th>Fecha Inicio</th>
        <th>Fecha Fin</th>
        <th>Precio</th>
        <th>Tipo de Actividad</th>
        <th>state</th>
        
            <th colspan="3">Acciones</th>
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
            <td>{{ $workshop->price }}</td>
            <td>{{ $workshop->name_categorie }}</td>
            <td>{{ $workshop->state }}</td>
            
                <td width="120">
                    {!! Form::open(['route' => ['workshops.destroy', $workshop->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('activities.show', [$workshop->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('activities.edit', [$workshop->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        @can('workshops.destroy')
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿estas seguro?')"]) !!}
                        @endcan
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
