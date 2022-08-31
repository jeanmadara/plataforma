<div class="table-responsive">
    <table class="table" id="workshops-table">
        <thead>
        <tr>
        <th>Usuario</th>
          
        <th>Actividad</th>
        <th>tipo de actividad</th>  
        <th>Descripción</th>
        <th>Responsable</th>
        <th>Fecha Inicio</th>
        <th>Fecha Fin</th>
        <th>Precio</th>
        
        
        

        </tr>
        </thead>
        <tbody>
        @foreach($workshops_user as $workshop)
            <tr>
            <td>{{ $workshop->name }}</td>
               
            <td>{{ $workshop->name_workshop }}</td>
            <td>{{ $workshop->name_categorie }}</td> 
            <td>{{ $workshop->description_workshop }}</td>
            <td>{{ $workshop->teacher}}</td>
            <td>{{ date('d/m/Y', strtotime($workshop->start)) }}</td>
            <td>{{ date('d/m/Y', strtotime($workshop->end)) }}</td>
            <td>${{ $workshop->price }}</td>
            
            
            
           
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
 <!-- Centramos la paginacion a la derecha -->
 <div class="pagination justify-content-end">
                            {!! $workshops_user->links() !!}
                          </div>     