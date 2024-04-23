<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Nombre:') !!}
    <p>{{ $user->name }}</p>
</div>

<!-- Role Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'Rol de este usuario:') !!}
    <p>
        <a href="../rols/{{ $user->role_id }} " class="btn btn-outline-dark">{{ $user->role->name}}</a>
    </p>
</div>

<!-- Phone Number Field -->
<div class="col-sm-12">
    {!! Form::label('phone_number', 'Numero de celular: ') !!}
    <p>{{ $user->phone_number }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Correo electronico') !!}
    <p>{{ $user->email }}</p>
</div>

<!--token actual-->
<div class="col-sm-12">
    {!! Form::label('Token','Token:') !!}
    <p>{{ $user->remember_token }}</p>

<!--Solicitar token-->
<div class = "col-sm-12">
    <form method="post" action="{{ route('generateToken', $user) }}">
        @csrf
        @method('POST')
        <button type="submit" class="btn btn-primary">Generar token</button>
    </form>
</div>

<!-- Email Verified At Field -->
<div class="col-sm-12">
    {!! Form::label('email_verified_at', 'Verificacion de correo electronico:') !!}
    <p>{{ $user->email_verified_at }}</p>
</div>

<!-- Password Field -->
<div class="col-sm-12">
    {!! Form::label('password', 'Contraseña:') !!}
    <p>{{ $user->password }}</p>
</div>

<!-- Remember Token Field -->
<div class="col-sm-12">
    {!! Form::label('remember_token', 'Remember Token:') !!}
    <p>{{ $user->remember_token }}</p>
</div>

<!--Fotos con la misma descripción -->
<div class="col-sm-12">
    @if ($user->photos->isNotEmpty())
        <h4>Fotos del usuario</h4>
        <ul>
            @foreach ($user->photos as $photo)
                <li>
                    <img src="{{asset($photo->url)}}" alt="" style="width: 20%">
                    <p><a href="{{ route('photos.show', $photo->id) }}">{{ $photo->url }}</a></p>
                </li>
            @endforeach
        </ul>
    @else
        <p>El usuario no tiene fotos asociadas</p>
    @endif
</div>

