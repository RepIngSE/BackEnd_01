<!-- Menu -->

    <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}" >
            <i class="nav-icon fas fa-home"></i>
            <p>Inicio</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }} ">
            <i class="nav-icon fas fa-thin fa-users"></i>
            <p>Usuarios</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('rols.index') }}" class="nav-link {{ Request::is('rols*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-thin fa-viruses"></i>
            <p>Roles</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('photos.index') }}" class="nav-link {{ Request::is('photos*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-regular fa-images"></i>
            <p>Fotos</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('photoDetails.index') }}" class="nav-link {{ Request::is('photoDetails*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-duotone fa-clone"></i>
            <p>Detalles de Fotos</p>
        </a>
    </li>



<li class="nav-item">
    <a href="{{ route('qrcodes.index') }}" class="nav-link {{ Request::is('qrcodes*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-qrcode"></i>
        <p>Códigos QR</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('transactions.index') }}" class="nav-link {{ Request::is('transactions*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-exchange-alt"></i>
        <p>Transacciones</p>
    </a>
</li>
