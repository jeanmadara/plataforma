<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'Usuario:') !!}
    {!! Form::select('user_id', $users, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Workshop Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('workshop_id', 'Workshop:') !!}
    {!! Form::select('workshop_id', $workshops, null, ['class' => 'form-control custom-select']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state', 'Estado:') !!}
    {!! Form::select('state', ['activo' => 'activo', 'no activo' => 'no activo'], null, ['class' => 'form-control custom-select']) !!}
</div>