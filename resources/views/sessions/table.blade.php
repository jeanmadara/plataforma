<div class="table-responsive">
    <table class="table" id="sessions-table">
        <thead>
        <tr>
            <th>Nombre del Curso</th>
        <th>Descripción</th>
        <th>Fecha Inicio</th>
        <th>Fecha Fin</th>
        <th>Precio</th>
        @can('activities.create')<th>añadir sesion</th>@endcan
        <th>ver sesiones</th>
        
       
        </tr>
        </thead>
        <tbody>
        @foreach($workshops as $workshop)
            <tr>
                <td>{{ $workshop->name_workshop }}</td>
            <td>{{ $workshop->description_workshop }}</td>
            <td>{{ date('d/m/Y', strtotime($workshop->start)) }}</td>
            <td>{{ date('d/m/Y', strtotime($workshop->end)) }}</td>
            <td>${{ $workshop->price }}</td>
            @can('activities.create')<td>    
                <a class="btn btn-info" href="{{ route('addsessions', [$workshop->workshop_id]) }}">añadir sesion</a>
            </td>@endcan
                
            <td>
                <a class="btn btn-info" href="{{ route('sessionlist', [$workshop->workshop_id]) }}">Ver sesiones</a>
            </td>
           
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
