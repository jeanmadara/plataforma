<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Nombre:') !!}
    <p>{{ $categorie->name }}</p>
</div>

<!-- Detail Field -->
<div class="col-sm-12">
    {!! Form::label('detail', 'Detalle:') !!}
    <p>{{ $categorie->detail }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Creado el:') !!}
    <p>{{ $categorie->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Actualizado el:') !!}
    <p>{{ $categorie->updated_at }}</p>
</div>

