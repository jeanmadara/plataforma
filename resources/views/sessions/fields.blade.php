<!-- Workshop Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('workshop_id', 'Seleccione el Curso:') !!}
    {!! Form::select('workshop_id', $workshop_id, null, ['class' => 'form-control custom-select']) !!}
</div>
<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre de la sesión:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<!-- description_session Field -->
<div class="form-group col-sm-12">
    {!! Form::label('description_session', 'Descripción de la sesión:') !!}
    {!! Form::textarea('description_session', null, ['class' => 'form-control']) !!}
</div>
<!-- reference Field -->
<div class="form-group col-sm-12">
    {!! Form::label('reference', 'Link de referencia:') !!}
    {!! Form::text('reference', null, ['class' => 'form-control']) !!}
</div>
<!-- Start Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start', 'Fecha hora Inicio:') !!}
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
    {!! Form::label('end', 'Fecha hora Fin:') !!}
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


