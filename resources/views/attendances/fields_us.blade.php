<!-- Workshop Id Field -->

{{ Form::hidden('session_id', $session_id) }}



<!-- Name User id Field -->
<div class="form-group col-sm-12">
@foreach($profiles as $value)
<label>{{ Form::checkbox('user_id[]', $value->user_id, false, array('class' => 'name')) }}
{{ $value->full_name }}</label>
<br/>
@endforeach
</div>


