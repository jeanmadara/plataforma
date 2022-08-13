<!-- Full Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('full_name', 'Nombre Completo:') !!}
    {!! Form::text('full_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Dni Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dni', 'Cédula o Pasaporte:') !!}
    {!! Form::text('dni', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Teléfono:') !!}
    {!! Form::number('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Breve Descripción:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {{ Form::hidden('user_id', auth()->id()) }}
</div>


<script>//cedula
function check_Cedula(form)
{
  var cedula = form.dni.value;
  array = cedula.split( "" );
  num = array.length;
  if ( num == 10 )
  {
    total = 0;
    digito = (array[9]*1);
    for( i=0; i < (num-1); i++ )
    {
      mult = 0;
      if ( ( i%2 ) != 0 ) {
        total = total + ( array[i] * 1 );
      }
      else
      {
        mult = array[i] * 2;
        if ( mult > 9 )
          total = total + ( mult - 9 );
        else
          total = total + mult;
      }
    }
    decena = total / 10;
    decena = Math.floor( decena );
    decena = ( decena + 1 ) * 10;
    final = ( decena - total );
    if ( ( final == 10 && digito == 0 ) || ( final == digito ) ) {
      alert( "La c\xe9dula ES v\xe1lida!!!" );
      return true;
    }
    else
    {
      alert( "La c\xe9dula NO es v\xe1lida!!!" );
      return false;
    }
  }
  else
  {
    alert("La c\xe9dula no puede tener menos de 10 d\xedgitos");
    return false;
  }
}</script>