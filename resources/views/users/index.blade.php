<!-- Configuración botones generales de cada pantalla (Index) -->

@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Usuarios</h1>
                </div>
                <div class="col-sm-5">
                    <a class="btn btn-info float-right"
                       href="{{ route('users.create') }}">
                        Agregar
                    </a>
                </div>
                <div class="col-sm-1">
                    <a href="{{ route('home') }}"
                        class="btn btn-outline-dark float-right"
                        style="border-color: #000;"
                        onmouseover="this.style.backgroundColor='#add8e6'; this.style.color='#000';"
                        onmouseout="this.style.backgroundColor=''; this.style.color='';">
                        Inicio
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('users.table')
        </div>
    </div>

@endsection
