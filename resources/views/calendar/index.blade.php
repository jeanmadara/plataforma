@extends('layouts.app')

@section('content')

<script>
document.addEventListener('DOMContentLoaded', function() {
    /* let formulario = document.querySelector("form"); 
    var evt=[]; */
    $.ajax({
        url:'/eventos/get',
        type:"GET",
        dataType: "JSON",
        async:false,

    }).done(function(r){
        evt=r;
        //console.log(evt);
    })

    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      locale: 'es',
      headerToolbar: { 
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,listWeek'},
        events: evt,
        @can('activities.create')
        dateClick: function(info) {
          //alert('Clicked on: ' + info.dateStr);
          $("#start").val(info.dateStr);
          $("#end").val(info.dateStr);
          $("#session").modal("show");
            //$("#star").val(date.format());
            //$("#session").modal("show");
          },
          @endcan
          eventClick: function(info) {
            //alert('Resource ID: ' + info.event.end);
               $evento = calendar.getEventById( info.event.id );
               //alert('Resource ID: ' + $evento["descripcion"]);
               //console.log(info.event);
               //$('#id').val(info.event.id);
               $('#editid').val(info.event.id);
               $('#editname').val(info.event.title);
               //$('#editasunto').val(info.event.extendedProps.asunto);
               $('#editdescription_session').val(info.event.extendedProps.ds);
               $('#editreference').val(info.event.extendedProps.reference);
               $('#editstart').val(moment(info.event.start).format("YYYY-MM-DD"));
               $('#editend').val(moment(info.event.end).format("YYYY-MM-DD"));
               $('#edithora_inicio').val(moment(info.event.start).format("HH:mm"));
               $('#edithora_fin').val(moment(info.event.end).format("HH:mm"));
               $('#sessionedit').modal("show");
             }

    });
    calendar.render();

    $('#btnupdate').click(function(){
      console.log("hola");
      var id= $('#editid').val();
      var name= $('#edittitle').val();
      var description_session= $('#editdescription_session').val();
      var reference= $('#editreference').val();
     

      $.post("/calendar/edit",
      {
          id:id,
          name:name,
          description_session:description_session,
          reference:reference,
         
      },
      function(data){
          if (data==1){
              $("cerrar").click();
         }
       })
      })

/*     document.getElementById("btnSave").addEventListener("click",function(){
        const datos= new FormData(formulario);
        var title= $('#title').val();
        console.log(title);
        console.log(formulario.title.value);
       

    });
 */
    
  });


</script>

<div class="container">
    <div id="calendar"></div>
    </div>
    

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
      <div class="form-group col-sm-12">
       <label for="name">nombre de la sesión</label>
      <input type="text" class="form-control" name="name" id="editname" aria-describedby="helpId">
      <small id="helpId" class="form-text text-muted">usar formato</small>
      </div>

      <div class="form-group col-sm-12">
      <label for="description_session">Descripcion</label>
      <input type="textarea" class="form-control" name="description_session" id="editdescription_session" aria-describedby="helpId">
     
      </div>

      <div class="form-group col-sm-12">
      <label for="reference">Link de referencia</label>
      <input type="text" class="form-control" name="reference" id="editreference" aria-describedby="helpId" placeholder="Link de referencia para la sesión">
  
      </div>

      <div class="form-group col-sm-12">
       <label for="start">fecha</label>
      <input type="text" readonly class="form-control" name="start" id="editstart" aria-describedby="helpId">
     
      </div>
      <div class="form-group col-sm-4">
                <label>hora Inicio</label>
                <input type="time" name="hora_inicio" id="edithora_inicio" class="form-control">
            </div>

      <div class="form-goup">
       <label hidden for="end">fecha fin</label>
      <input type="text" readonly hidden class="form-control" name="end" id="editend" aria-describedby="helpId">
    
      </div>

      <div class="form-group col-sm-4">
                <label>hora Fin</label>
                <input type="time" name="hora_fin" id="edithora_fin" class="form-control">
            </div>
      
      </div>
      <div class="modal-footer">
      @can('activities.create')<button type="submit" class="btn btn-primary" id="btnupdate">Modificar</button>@endcan
      <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrar">Cancelar</button>
        
      </div>
      </form>
    </div>
  </div>
</div>







@endsection