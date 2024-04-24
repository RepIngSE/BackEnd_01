<x-laravel-ui-adminlte::adminlte-layout>

     <!-- Login  -->

    <body class="hold-transition login-page" style="background-color: #EAEDED;">
        <div class="login-box" style="background-color: #FFFFFF;">
            <div class="login-logo">
                <a href="{{ url('/home') }}"><b>{{ config('app.name') }}</b></a>
            </div>

            <!-- /.login-box-body -->
            <div class="card" style="background-color: #F5F5F5;">
                <div class="card-body login-card-body" style="background-color: #FFFFFF;">
                <p class="login-box-msg">Inicio de sesión</p>

                    <form method="post" action="{{ url('/login') }}">
                        @csrf

                        <div class="input-group mb-3">
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email"
                                class="form-control @error('email') is-invalid @enderror">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                            </div>
                            @error('email')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" name="password" placeholder="Password"
                                class="form-control @error('password') is-invalid @enderror">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @error('password')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">Recordar datos</label>
                                </div>
                            </div>

                            <div class="col-4">
                                <button type="submit" class="btn btn-info btn-block">Ingresar</button>
                            </div>
                        </div>
                    </form>
                    <p class="mb-1">
                        <a href="{{ route('password.request') }}" class="text-info">Recuperar contraseña</a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('register') }}" class="text-center text-info">Registrar nuevo miembro</a>
                    </p>
                </div>
            </div>
        </div>
    </body>
</x-laravel-ui-adminlte::adminlte-layout>
