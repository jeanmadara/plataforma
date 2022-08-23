<div class="table-responsive">
    <table class="table" id="categories-table">
         <thead>                                     
            <th style="display: none;">ID</th>
            <th>Usuario</th>
            <th>E-mail</th>
            
            <th>Beca solicitada</th>
            <th>Justificación</th>
            <th style=>Porcetanje</th>
            <th>Acciones</th>                                                                   
            </thead>
            <tbody>
                                @foreach ($pending as $usuario)
                                  <tr>
                                    <td style="display: none;">{{ $usuario->id }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    
                                    <td>
                                    <h5><span class="badge badge-dark">{{ $usuario->name_scholarship }}</span></h5>
                                    </td>

                                  

                                    <td>{{ $usuario->scholarship_justification }}</td>
                                    <td>{{ $usuario->percentage }}%</td>
                                    
                                    <td>                                  
                                      <a class="btn btn-info" href="{{ route('agree', [$usuario->scholarship_apply, $usuario->id]) }}">Aprobar</a>

                                      <a class="btn btn-danger" href="{{ route('deny', [$usuario->id]) }}">Negar</a>
                                    </td>
                                                                      
                                      
                                    
                                  </tr>
                                @endforeach
                              </tbody>
    </table>
    
</div>
