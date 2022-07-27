<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name_categorie', 'Nombre:') !!}
    {!! Form::text('name_categorie', null, ['class' => 'form-control']) !!}
</div>

<!-- Detail Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('detail', 'Detalle:') !!}
    {!! Form::textarea('detail', null, ['class' => 'form-control']) !!}
</div>