@extends('layouts.app')

@section('content')
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


                @include('user_workshops.table_user')

                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

