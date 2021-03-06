<div class="table-responsive">
    <table class="table" id="workshops-table">
        <thead>
        <tr>
            <th>Nombre</th>
        <th>Descripción</th>
        <th>Fecha Inicio</th>
        <th>Fecha Fin</th>
        <th>Precio</th>
        <th>Categorie Id</th>
            <th colspan="3">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($workshops as $workshop)
            <tr>
                <td>{{ $workshop->name }}</td>
            <td>{{ $workshop->description }}</td>
            <td>{{ $workshop->start }}</td>
            <td>{{ $workshop->end }}</td>
            <td>{{ $workshop->price }}</td>
            <td>{{ $workshop->categorie_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['workshops.destroy', $workshop->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('workshops.show', [$workshop->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('workshops.edit', [$workshop->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿estas seguro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
