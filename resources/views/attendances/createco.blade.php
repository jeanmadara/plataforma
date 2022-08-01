@extends('layouts.app')

@section('content')


    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create Attendance</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

        {!! Form::open(array('route' => 'attendances.store','method'=>'POST')) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                                                 
                                  
                                    {!! Form::label('session_id', 'Nombre de la sesión:') !!}
                                    {!! Form::select('session_id', $sessions, null, ['class' => 'form-control custom-select']) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="">Permisos para este Rol:</label>
                                    <br/>
                                    @foreach($profiles as $value)
                                        <label>{{ Form::checkbox('profile[]', $value->full_name, false, array('class' => 'name')) }}
                                        {{ $value->full_name }}</label>
                                    <br/>
                                    @endforeach
                                </div>
                            </div>        
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        {!! Form::close() !!}
        </div>
    </div>
@endsection
