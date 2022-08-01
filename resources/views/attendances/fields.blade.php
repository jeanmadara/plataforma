<!-- Session Id Field -->
<div class="form-group col-sm-6">
{!! Form::label('session_id', 'Nombre de la sesión:') !!}
{!! Form::select('session_id', $sessions, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- Name User id Field -->
<div class="form-group col-sm-12">
@foreach($profiles as $value)
<label>{{ Form::checkbox('user_id[]', $value->user_id, false, array('class' => 'name')) }}
{{ $value->full_name }}</label>
<br/>
@endforeach
</div>



