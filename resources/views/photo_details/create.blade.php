
<!-- Crear los detalles de la foto  -->

@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                    Crear detalles de la foto
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'photoDetails.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('photo_details.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Guardar', ['class' => 'btn btn-info']) !!}
                <a href="{{ route('photoDetails.index') }}" class="btn btn-secondary"> Cancelar </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
