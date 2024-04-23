@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50">Bienvenido</h1>
    </div>

    <div class="row row-cols-1 row-cols-md-4 g-4 ml-2 mr-2">
        <div class="col">
            <div class="card">
                <img src="https://cdn.pixabay.com/photo/2016/04/15/18/05/computer-1331579_640.png" class="card-img-top" alt="Img Usuario">
                <div class="card-body">
                    <a href="{{ route('users.index') }}" class="btn btn-dark">Usuarios</a>
                    <p class="card-text">En este apartado podras administrar a todos los usuarios dependiendo de los permisos que tengas. </p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="https://cdn-icons-png.flaticon.com/512/2211/2211680.png" class="card-img-top" alt="Img roles">
                <div class="card-body">
                    <a href="{{ route('rols.index') }}" class="btn btn-dark">Roles</a>
                    <p class="card-text">En este apartado podras administrar a todos los roles dependiendo de los permisos que tengas. </p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="https://www.shutterstock.com/image-vector/picture-flat-icon-long-shadow-260nw-281092040.jpg" class="card-img-top" alt="Img fotos">
                <div class="card-body">
                    <a href="{{ route('photos.index') }}" class="btn btn-dark">Fotos</a>
                    <p class="card-text">En este apartado podras administrar todas los fotos dependiendo de los permisos que tengas. </p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="https://c8.alamy.com/compes/2gn7bre/icono-editar-escribir-entrada-de-texto-con-cuadro-de-lapiz-cuadrado-2gn7bre.jpg" class="card-img-top" alt="Img detalles de fotos">
                <div class="card-body">
                    <a href="{{ route('photoDetails.index') }}" class="btn btn-dark">Detalles de fotos</a>
                    <p class="card-text">En este apartado podras administrar todos los detalles de las fotos dependiendo de los permisos que tengas. </p>
                </div>
            </div>
        </div>
    </div>
@endsection


