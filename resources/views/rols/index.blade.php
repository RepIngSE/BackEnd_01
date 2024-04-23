@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Roles</h1>
                </div>
                <div class="col-sm-5">
                    <a class="btn btn-secondary float-right"
                       href="{{ route('rols.create') }}">
                        Agregar
                    </a>
                </div>
                <div class="col-sm-1">
                    <a class="btn btn-outline-dark float-right"
                       href="{{ route('home') }}">
                        Inicio</a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('rols.table')
        </div>
    </div>

@endsection
