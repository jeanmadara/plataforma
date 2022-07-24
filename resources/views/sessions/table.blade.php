<div class="table-responsive">
    <table class="table" id="sessions-table">
        <thead>
        <tr>
            <th>Name</th>
        <th>Start</th>
        <th>End</th>
        <th>Workshop Id</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sessions as $session)
            <tr>
                <td>{{ $session->name }}</td>
            <td>{{ $session->start }}</td>
            <td>{{ $session->end }}</td>
            <td>{{ $session->workshop_id }}</td>
                <td width="120">
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
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
