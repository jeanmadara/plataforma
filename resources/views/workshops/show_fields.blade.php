<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name_workshop', 'Nombre del Curso:') !!}
    <p>{{ $workshop->name_workshop }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'descrición:') !!}
    <p>{{ $workshop->description_workshop }}</p>
</div>

<!-- Start Field -->
<div class="col-sm-12">
    {!! Form::label('start', 'Fecha de inicio:') !!}
    <p>{{ $workshop->start }}</p>
</div>

<!-- End Field -->
<div class="col-sm-12">
    {!! Form::label('end', 'Fecha Fin:') !!}
    <p>{{ $workshop->end }}</p>
</div>

<!-- Price Field -->
<div class="col-sm-12">
    {!! Form::label('price', 'Precio:') !!}
    <p>${{ $workshop->price }}</p>
</div>
