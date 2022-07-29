@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Actividades</h1>
                </div>
                <div class="col-sm-6">
                @can('activities.create')
                    <a class="btn btn-primary float-right"
                       href="{{ route('activities.create') }}">
                        Nueva Actividad
                    </a>@endcan

                    @can('student.index')<a class="btn btn-primary float-right"
                       href="{{ route('actcheckins.create') }}">
                        Registrarme a Actividad
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


                @include('activities.table_user')

                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

