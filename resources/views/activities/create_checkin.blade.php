@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Inscripción</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'userWorkshops.store']) !!}

            <div class="card-body">

            
            @can('workshops.create')<div class="row">
                    @include('user_workshops.fields')
                </div>@endcan

                @can('student.index')<div class="row">
                    @include('user_workshops.fields_user')
                </div>@endcan

            </div>

            <div class="card-footer">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('userWorkshops.index') }}" class="btn btn-default">Cancelar</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
