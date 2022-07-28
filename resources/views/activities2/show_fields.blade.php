<!-- State Field -->
<div class="col-sm-12">
    {!! Form::label('state', 'State:') !!}
    <p>{{ $userWorkshop->state }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $userWorkshop->user_id }}</p>
</div>

<!-- Workshop Id Field -->
<div class="col-sm-12">
    {!! Form::label('workshop_id', 'Workshop Id:') !!}
    <p>{{ $userWorkshop->workshop_id }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $userWorkshop->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $userWorkshop->updated_at }}</p>
</div>

