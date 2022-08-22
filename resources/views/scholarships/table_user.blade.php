<div class="table-responsive">
    <table class="table" id="categories-table">
         <thead>                                     
            <th style="display: none;">ID</th>
            <th>Usuario</th>
            <th>E-mail</th>
            <th>Curso</th>
            <th>tipo de beca</th>
            <th style=>Porcetanje</th>
            <th>Acciones</th>                                                                   
            </thead>
            <tbody>
                                @foreach ($usuarios as $usuario)
                                  <tr>
                                    <td style="display: none;">{{ $usuario->id }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>{{ $usuario->name_workshop }}</td>
                                    <td>
                                    <h5><span class="badge badge-dark">{{ $usuario->name_scholarship }}</span></h5>
                                    </td>

                                    <td>{{ $usuario->percentage }}%</td>
                                    
                                    <td>                                  
                                      <a class="btn btn-info" href="{{ route('comprobante', [$usuario->id]) }}">comprobate</a>
                                    </td>
                                  </tr>
                                @endforeach
                              </tbody>
    </table>
    
</div>
