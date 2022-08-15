<div class="table-responsive">
    <table class="table" id="workshops-table">
        <thead>
        <tr>
            <th>Nombre</th>
        <th>Descripción</th>
        <th>Fecha Inicio</th>
        <th>Fecha Fin</th>
        <th>Precio</th>
        @can('student.index')
        <th>Docente</th>@endcan
        @can('workshops.create')<th colspan="3">Acciones</th>@endcan
        </tr>
        </thead>
        <tbody>
        @foreach($workshops_user as $workshop)
            <tr>
                <td>{{ $workshop->name_workshop }}</td>
            <td>{{ $workshop->description_workshop }}</td>
            <td>{{ date('d/m/Y', strtotime($workshop->start)) }}</td>
            <td>{{ date('d/m/Y', strtotime($workshop->end)) }}</td>
            <td>${{ $workshop->price }}</td>
            @can('student.index')
            <td>{{ $workshop->teacher}}</td>@endcan
            @can('workshops.create')<td width="120">
                    {!! Form::open(['route' => ['workshops.destroy', $workshop->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('workshops.show', [$workshop->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('workshops.edit', [$workshop->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>@can('workshops.destroy')
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
