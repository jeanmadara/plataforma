<div class="table-responsive">
    <table class="table" id="attendances-table">
        <thead>
        <tr>
            <th>Nombre del Curso</th>
        <th>Descripción</th>
        <th>Fecha Inicio</th>
        <th>Fecha Fin</th>
        <th>Precio</th>
        
    
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
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
