@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Becas</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('scholarships.create') }}">
                        Agregar Nuevo
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('scholarships.table')

                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>

        <div class="col-sm-6">
        <h3>estudiantes pendiente a Beca</h3>
                </div>
                <div class="card">
            <div class="card-body p-0">
                @include('scholarships.table_pending')

                <div class="card-footer clearfix">
                    <div class="float-right">
                        <!-- Centramos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $pending->links() !!}
                          </div>     
                    </div>
                </div>
            </div>
        </div>


        <div class="col-sm-6">
                    <h3>estudiantes becados</h3>
                </div>
                <div class="card">
            <div class="card-body p-0">
                @include('scholarships.table_user')

                <div class="card-footer clearfix">
                    <div class="float-right">
                        <!-- Centramos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $usuarios->links() !!}
                          </div>     
                    </div>
                </div>
            </div>
        </div>


    </div>

    
    

@endsection

