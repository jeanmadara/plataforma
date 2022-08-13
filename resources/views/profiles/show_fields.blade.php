<!-- Full Name Field -->
<div class="col-sm-12">
    {!! Form::label('full_name', 'Full Name:') !!}
    <p>{{ $profile->full_name }}</p>
</div>

<!-- Dni Field -->
<div class="col-sm-12">
    {!! Form::label('dni', 'Dni:') !!}
    <p>{{ $profile->dni }}</p>
</div>

<!-- Phone Field -->
<div class="col-sm-12">
    {!! Form::label('phone', 'Phone:') !!}
    <p>{{ $profile->phone }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $profile->description }}</p>
</div>

