@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Fotos</h1>
                </div>
                <div class="col-sm-5">
                <a class="btn btn-info float-right"
                       href="{{ route('photos.create') }}">
                        Agregar
                    </a>
                </div>
                <div class="col-sm-1">
                    <a class="btn btn-outline-dark float-right"
                        href="{{ route('home') }}"
                        style="border-color: #000;"
                        onmouseover="this.style.backgroundColor='#add8e6'; this.style.color='#fff';"
                        onmouseout="this.style.backgroundColor=''; this.style.color='';">
                        Inicio
                    </a>
                </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('photos.table')
        </div>
    </div>

@endsection
