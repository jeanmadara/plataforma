<!-- Workshop Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('scholarship_apply', 'Tipo de Beca a Solicitar:') !!}
    {!! Form::select('scholarship_apply', $scholarship, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('scholarship_justification', 'Justificacion de la solicitud:') !!}
    {!! Form::textarea('scholarship_justification', null, ['class' => 'form-control']) !!}
</div>


