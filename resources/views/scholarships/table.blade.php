<div class="table-responsive">
    <table class="table" id="scholarships-table">
        <thead>
        <tr>
            <th>Nombre</th>
        <th>Descripción</th>
            <th colspan="3">Acción</th>
        </tr>
        </thead>
        <tbody>
        @foreach($scholarships as $scholarship)
            <tr>
                <td>{{ $scholarship->name }}</td>
            <td>{{ $scholarship->description }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['scholarships.destroy', $scholarship->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('scholarships.show', [$scholarship->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('scholarships.edit', [$scholarship->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Estas Seguro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
