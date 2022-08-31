<!-- Full Name Field -->
<div class="col-sm-12">
    {!! Form::label('full_name', 'Nombre Completo:') !!}
    <p>{{ $profile->full_name }}</p>
</div>

<!-- Dni Field -->
<div class="col-sm-12">
    {!! Form::label('dni', 'Cédula:') !!}
    <p>{{ $profile->dni }}</p>
</div>

<!-- Phone Field -->
<div class="col-sm-12">
    {!! Form::label('phone', 'Telefono:') !!}
    <p>{{ $profile->phone }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Descripción:') !!}
    <p>{{ $profile->description }}</p>
</div>

