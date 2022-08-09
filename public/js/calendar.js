
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
        
        dateClick: function(info) {
          //alert('Clicked on: ' + info.dateStr);
          $("#start").val(info.dateStr);
          $("#end").val(info.dateStr);
          $("#session").modal("show");
            //$("#star").val(date.format());
            //$("#session").modal("show");
          },
          
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
