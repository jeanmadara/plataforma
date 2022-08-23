<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('username', 'Nombre de usuario:') !!}
    <p>{{ $usuario->name }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-6">
    {!! Form::label('nombre', 'Nombre Completo:') !!}
    <p>{{ $usuario->full_name }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-6">
    {!! Form::label('dni', 'Cédula:') !!}
    <p>{{ $usuario->dni }}</p>
</div>
<div class="col-sm-12">
<hr>
</div>
<!-- Description Field -->
<div class="col-sm-6">
    {!! Form::label('name_workshop', 'Curso:') !!}
    <p>{{ $usuario->name_workshop }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-6">
    {!! Form::label('price', 'Precio del curso:') !!}
    <p>${{ $usuario->price }}</p>
</div>
<!-- name_scholarship Field -->
<div class="col-sm-6">
    {!! Form::label('name_scholarship', 'Beca otorgada:') !!}
    <p>{{ $usuario->name_scholarship }}</p>
</div>
<div class="col-sm-6">
    {!! Form::label('percentage', 'porcentaje:') !!}
    <p>{{ $usuario->percentage }}%</p>
</div>
<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('price', 'valor a pagar aplicando Beca:') !!}
    <p>${{ $usuario->price-($usuario->price * $usuario->percentage / 100)}}</p>
</div>
