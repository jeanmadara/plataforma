<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre de Workshop:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- teacher Id Field -->
<div class="form-group col-sm-6">
    {{ Form::hidden('teacher', auth()->id()) }}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Breve Descripción:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Start Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start', 'Fecha de inicio:') !!}
    {!! Form::text('start', null, ['class' => 'form-control','id'=>'start']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#start').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- End Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end', 'Fecha Fin:') !!}
    {!! Form::text('end', null, ['class' => 'form-control','id'=>'end']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#end').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Precio:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Categorie Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categorie_id', 'Categoria:') !!}
    {!! Form::select('categorie_id', $categories, null, ['class' => 'form-control custom-select']) !!}
</div>
