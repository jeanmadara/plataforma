@extends('layouts.app')

@section('content')
<div class="col-md-12">
                <div class="page-header">
                    
                        Busqueda Avanzada
                        {{ Form::open(['route' => 'boletines', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
                            <div class="form-group">
                                
                                {!! Form::select('name_categorie', $categorie, null, ['class' => 'form-control','placeholder' => 'tipo de actividad']) !!}  
                            </div>
                            
                            <div class="form-group">
                                {{ Form::text('teacher', null, ['class' => 'form-control', 'placeholder' => 'Docente']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::text('name_workshop', null, ['class' => 'form-control', 'placeholder' => 'Nombre de actividad']) }}
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </div>
                        {{ Form::close() }}
                    
                </div>
            </div>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cursos Disponibles</h1>
                </div>
                <div class="col-sm-6">
                @can('workshops.destroy')
                    <a class="btn btn-primary float-right"
                       href="{{ route('userWorkshops.create') }}">
                        Agregar Nuevo
                    </a>@endcan

                    @can('student.index')<a class="btn btn-primary float-right"
                       href="{{ route('userWorkshops.create') }}">
                        inscribirme a un curso
                    </a>@endcan
                </div>

            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">


                @include('user_workshops.tablelist')

                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

