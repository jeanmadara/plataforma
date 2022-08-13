@extends('layouts.app')

@section('content')


    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Reportes</h1>
                </div>
            </div>
        </div>
        <div class="col-md-12">
                <div class="page-header">
                    
                <div class="col-sm-6">
                    <h5>Busqueda Avanzada</h5>
                </div>
                        {{ Form::open(['route' => 'reportes', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
                            <div class="form-group">
                                
                                {!! Form::select('name_categorie', $categorie, null, ['class' => 'form-control','placeholder' => 'tipo de actividad']) !!}  
                            </div>
                            
                            <div class="form-group">
                                {{ Form::text('teacher', null, ['class' => 'form-control', 'placeholder' => 'Username']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::text('name_workshop', null, ['class' => 'form-control', 'placeholder' => 'Nombre de actividad']) }}
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">
                                    <span class="fa fa-search"></span>
                                </button>
                            </div>
                        {{ Form::close() }}
                    
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

