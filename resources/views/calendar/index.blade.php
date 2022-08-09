@extends('layouts.app')

@section('content')

<div class="container">
    <div id="calendar"></div>
    </div>
    
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#session">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="session" tabindex="-1" role="dialog" aria-labelledby="sessionLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sessionLabel">Crear Sesión</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      <form action="/calendar/create">
        {!! csrf_field() !!}

      <div class="form-group col-sm-12">
      {!! Form::label('workshop_id', 'Seleccione el Curso:') !!}
      {!! Form::select('workshop_id', $workshop_id, null, ['class' => 'form-control custom-select']) !!}
      </div> 

      <div class="form-group col-sm-12">
       <label for="name">nombre de la sesión</label>
      <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="Ingrese el nombre de la sesión">
      <small id="helpId" class="form-text text-muted">usar formato</small>
      </div>

      <div class="form-group col-sm-12 col-lg-12">
      <label for="description_session">Descripción</label>
      <input type="textarea" class="form-control" name="description_session" id="description_session" aria-describedby="helpId" placeholder="Ingrese una descripción de la sesión">
      <small id="helpId" class="form-text text-muted">help text</small>
      </div>

      <div class="form-group col-sm-12">
      <label for="reference">Link de referencia</label>
      <input type="text" class="form-control" name="reference" id="reference" aria-describedby="helpId" placeholder="Link de referencia para la sesión">
      
      </div>

      <div class="form-group col-sm-12">
       <label for="start">fecha</label>
      <input type="text" readonly class="form-control" name="start" id="start" aria-describedby="helpId">
      </div>

      <div class="form-group col-sm-12">
       <label hidden for="end">fecha fin</label>
      <input type="text" readonly hidden class="form-control" name="end" id="end" aria-describedby="helpId">
    
      </div>

   
      <div class="form-group col-sm-6">
                <label>Hora Inicio</label>
                <input type="time" name="hora_inicio" id="hora_inicio" class="form-control">
            </div>

      

      <div class="form-group col-sm-6">
                <label>Hora Fin</label>
                <input type="time" name="hora_fin" id="hora_fin" class="form-control">
      </div>
      

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary" id="btnSave">Guardar</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        
      </div>
      </form>
      
    </div>
  </div>
</div>

<!-- Modal edit -->
<div class="modal fade" id="sessionedit" tabindex="-1" role="dialog" aria-labelledby="sessionLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sessionLabel">Editar Sesión</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      <form action="/calendar/edit">
        {!! csrf_field() !!}

        <div class="form-group col-sm-12">
    {!! Form::label('workshop_id', 'Seleccione el Curso:') !!}
    {!! Form::select('workshop_id', $workshop_id, null, ['class' => 'form-control custom-select']) !!}
</div>


<input type="hidden" name="id" id="editid">
      <div class="form-goup">
       <label for="name">nombre de la sesión</label>
      <input type="text" class="form-control" name="name" id="editname" aria-describedby="helpId">
      <small id="helpId" class="form-text text-muted">usar formato</small>
      </div>

      <div class="form-goup">
      <label for="description_session">Descripcion</label>
      <input type="textarea" class="form-control" name="description_session" id="editdescription_session" aria-describedby="helpId">
     
      </div>

      <div class="form-goup">
      <label for="reference">Link de referencia</label>
      <input type="text" class="form-control" name="reference" id="editreference" aria-describedby="helpId" placeholder="hhhh">
  
      </div>

      <div class="form-goup">
       <label for="start">fecha</label>
      <input type="text" readonly class="form-control" name="start" id="editstart" aria-describedby="helpId">
     
      </div>
      <div class="col-md4">
                <label>hora Inicio</label>
                <input type="time" name="hora_inicio" id="edithora_inicio" class="form-control">
            </div>

      <div class="form-goup">
       <label hidden for="end">fecha fin</label>
      <input type="text" readonly hidden class="form-control" name="end" id="editend" aria-describedby="helpId">
    
      </div>

      <div class="col-md4">
                <label>hora Inicio</label>
                <input type="time" name="hora_fin" id="edithora_fin" class="form-control">
            </div>
      
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary" id="btnupdate">Guardar</button>
      <button type="button" class="btn btn-warning" id="btnupdssate">Modificar</button>  
      <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar">Cancelar</button>
        
      </div>
      </form>
    </div>
  </div>
</div>







@endsection