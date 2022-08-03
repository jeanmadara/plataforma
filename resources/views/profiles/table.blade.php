<div class="table-responsive">
    <table class="table" id="profiles-table">
        <thead>
        <tr>
            <th>Nombre Completo</th>
        <th>Cédula o Pasaporte</th>
        <th>Teléfono</th>
        <th>Descripción</th>
       
            <th colspan="3">Acción</th>
        </tr>
        </thead>
        <tbody>
        @if($profiles)    
        @foreach($profiles as $profile)
            <tr>
                <td>{{ $profile->full_name }}</td>
            <td>{{ $profile->dni }}</td>
            <td>{{ $profile->phone }}</td>
            <td>{{ $profile->description }}</td>
            
                <td width="120">
                    {!! Form::open(['route' => ['profiles.destroy', $profile->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('profiles.show', [$profile->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('profiles.edit', [$profile->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿estas seguro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        @endif
        </tbody>
    </table>
</div>
