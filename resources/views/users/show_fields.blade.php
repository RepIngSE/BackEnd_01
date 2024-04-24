<!-- Configuración para ver lo que está dentro de Usuarios -->

<div class="row">
    <!-- Información del Usuario -->
    <div class="col-sm-6">
        <!-- Name Field -->
        <div class="form-group">
            {!! Form::label('name', 'Nombre:') !!}
            <p>{{ $user->name }}</p>
        </div>

        <!-- Role Id Field -->
        <div class="form-group">
            {!! Form::label('user_id', 'Rol de este usuario:') !!}
            <p>
                <a href="../rols/{{ $user->role_id }}" class="btn btn-outline-dark"
                    onmouseover="this.style.backgroundColor='#add8e6'; this.style.color='#000';"
                    onmouseout="this.style.backgroundColor=''; this.style.color='';">
                    {{ $user->role->name}}
                </a>
            </p>
        </div>

        <!-- Phone Number Field -->
        <div class="form-group">
            {!! Form::label('phone_number', 'Número de celular: ') !!}
            <p>{{ $user->phone_number }}</p>
        </div>

        <!-- Email Field -->
        <div class="form-group">
            {!! Form::label('email', 'Correo electrónico') !!}
            <p>{{ $user->email }}</p>
        </div>

        <!-- Token actual -->
        <div class="form-group">
            {!! Form::label('Token','Token:') !!}
            <p>{{ $user->remember_token }}</p>
        </div>

        <!-- Solicitar token -->
        <div class="form-group">
            <form method="post" action="{{ route('generateToken', $user) }}">
                @csrf
                @method('POST')
                <button type="submit" class="btn btn-info">Generar token</button>
            </form>
        </div>

        <!-- Email Verified At Field -->
        <div class="form-group">
            {!! Form::label('email_verified_at', 'Verificación de correo electrónico:') !!}
            <p>{{ $user->email_verified_at }}</p>
        </div>

        <!-- Password Field -->
        <div class="form-group">
            {!! Form::label('password', 'Contraseña:') !!}
            <p>{{ $user->password }}</p>
        </div>

        <!-- Remember Token Field -->
        <div class="form-group">
            {!! Form::label('remember_token', 'Remember Token:') !!}
            <p>{{ $user->remember_token }}</p>
        </div>
    </div>

   <!-- Fotos del Usuario -->
   <div class="col-sm-6">
        @if ($user->photos->isNotEmpty())
            <h4>Fotos del usuario</h4>
            <div class="row">
                @foreach ($user->photos->chunk(4) as $chunk)
                    <div class="col-sm-3"> <!-- Cada columna contendrá hasta 4 fotos -->
                        <ul class="list-unstyled">
                            @foreach ($chunk as $photo)
                                <li style="margin-bottom: 10px;"> <!-- Espacio entre fotos -->
                                    <img src="{{ asset($photo->url) }}" alt="" style="width: 100%">
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        @else
            <p>El usuario no tiene fotos asociadas</p>
        @endif
    </div>
</div>