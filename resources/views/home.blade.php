@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50">Bienvenido</h1>
    </div>

    <div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-3">
            <a href="{{ route('users.index') }}" class="btn btn-info">Usuarios</a>
                <img src="https://cdn-icons-png.flaticon.com/512/6073/6073873.png" class="card-img-top" alt="Img Usuario">
                <div class="card-body">
                    <p class="card-text">En este fragmento podrás ver los usuarios de la plataforma dependiento de los permisos que tengas.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-3">
            <a href="{{ route('rols.index') }}" class="btn btn-info">Roles</a>
                <img src="https://cdn-icons-png.flaticon.com/512/2211/2211615.png" class="card-img-top" alt="Img roles">
                <div class="card-body">
                    <p class="card-text">En este fragmento podrás ver los roles asignados a cada usuario. </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-3">
            <a href="{{ route('photos.index') }}" class="btn btn-info">Fotos</a>
                <img src="https://cdn-icons-png.flaticon.com/512/336/336035.png" class="card-img-top" alt="Img fotos">
                <div class="card-body">
                    <p class="card-text">En este fragmento podrás ver,adjuntar y editar las fotos que tengas en tu perfil.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-3">
            <a href="{{ route('photoDetails.index') }}" class="btn btn-info">Detalles de fotos</a>
                <img src="https://cdn-icons-png.flaticon.com/512/5673/5673243.png" class="card-img-top" alt="Img detalles de fotos">
                <div class="card-body">
                    <p class="card-text">En este fragmento podrás ver los detalles o la descripción que tengas de cada foto.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-3">
            <a href="{{ route('qrcodes.index') }}" class="btn btn-info">Códigos QR</a>
                <img src="https://cdn.icon-icons.com/icons2/1521/PNG/512/qrcodehd_106111.png" class="card-img-top" alt="Img detalles de fotos">
                <div class="card-body">
                    <p class="card-text">En este fragmento podrás ver los QR generados de los diferentes productos de la página.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-3">
            <a href="{{ route('transactions.index') }}" class="btn btn-info">Transacciones</a>
                <img src="https://cdn-icons-png.flaticon.com/512/2534/2534227.png" class="card-img-top" alt="Img detalles de fotos">
                <div class="card-body">
                    <p class="card-text">En este fragmento podrás ver las transacciones realizadas de las compras de determinados productos.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


