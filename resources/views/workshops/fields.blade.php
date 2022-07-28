<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name_workshop', 'Nombre de Workshop:') !!}
    {!! Form::text('name_workshop', null, ['class' => 'form-control']) !!}
</div>

<!-- teacher Id Field -->
<div class="form-group col-sm-6">
    {{ Form::hidden('teacher', $teacher->implode("full_name")) }}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description_workshop', 'Breve Descripción:') !!}
    {!! Form::textarea('description_workshop', null, ['class' => 'form-control']) !!}
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
    
    {{ Form::hidden('categorie_id', 1) }}
</div>
