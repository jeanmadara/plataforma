<div class="table-responsive">
    <table class="table" id="sessions-table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Descripción</th>
            <th>Link de Referencia</th>
        <th>Fecha</th>
        <th>End</th>
        <th>Curso</th>
        <th>Asistencia</th>
        @can('activities.create')<th colspan="3">Action</th>@endcan
        </tr>
        </thead>
        <tbody>
        @foreach($sessions as $session)
            <tr>
                <td>{{ $session->name }}</td>
                <td>{{ $session->description_session }}</td>
                
                <td><a href="{!! $session->reference !!}"target="_blank">{{ $session->reference }}</a></td>
            <td>{{ $session->start }}</td>
            <td>{{ $session->end }}</td>
            <td>{{ $session->name_workshop }}</td>
            <td>
                    <a class="btn btn-info" href="{{ route('attendances.show', [$session->id]) }}">Ver Asistencia</a>
            </td>
            @can('activities.create')<td width="120">
                    {!! Form::open(['route' => ['sessions.destroy', $session->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('sessions.show', [$session->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('sessions.edit', [$session->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>@endcan
            </tr>
        @endforeach
        </tbody>
    </table>
</div>