@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Mis Cursos</h1>
                </div>
                @can('workshops.create')
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('workshops.create') }}">
                        Agregar Nuevo
                    </a>
                </div>
                @endcan
                @can('student.index')
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('userWorkshops.create') }}">
                       inscribirme a un curso
                    </a>
                </div>
                @endcan
               
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                

                @can('workshops.index')
                @include('workshops.table_user')
                @endcan

                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

