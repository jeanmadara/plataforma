<!-- State Field -->
<div class="col-sm-12">
    <p><h3>{{ $attendance->name }}</h3></p>
</div>

<!-- Name User Field -->
<div class="col-sm-12">
    <p>{{ $attendance->description_session }}</p>
</div>



<!-- Created At Field -->
<div class="col-sm-12">
   <p><h4>{!! Form::label('created_at', 'Estudiantes presentes:') !!}</h4></p> 
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
@foreach($profiles as $value)
<p>
<i class="fa fa-check"></i> {{ $value->full_name }}</p>
@endforeach
</div>
