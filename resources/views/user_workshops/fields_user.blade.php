




<!-- Workshop Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('workshop_id', 'Workshop:') !!}
    {!! Form::select('workshop_id', $workshops, null, ['class' => 'form-control custom-select']) !!}
</div>



<!-- User Id Field -->
<div class="form-group col-sm-6">
    {{ Form::hidden('user_id', auth()->id()) }}
</div>

<!-- User state Field -->
<div class="form-group col-sm-6">
    {{ Form::hidden('state', 'activo') }}
</div>