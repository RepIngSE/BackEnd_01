<!-- Configuración general de la tabla de usuarios -->

<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="users-table">
        <thead class="thead" style="background-color: #17a2b8; color: #ffffff;">
            <tr>
                <th>Nombre</th>
                <th>Rol</th>
                <th>Numero de telefono</th>
                <th>Correo electronico</th>
                <th colspan="3">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>
                        <a href="../rols/{{ $user->role_id }}" class="btn btn-outline-dark"
                           onmouseover="this.style.backgroundColor='#add8e6'; this.style.color='#000';"
                           onmouseout="this.style.backgroundColor=''; this.style.color='';">
                            {{ $user->role->name }}
                        </a>
                    </td>
                    <td>{{ $user->phone_number }}</td>
                    <td>{{ $user->email }}</td>
                    <td style="width: 200px">
                        {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('users.show', [$user->id]) }}"
                                class='btn btn-sm btn-outline-info'
                                style="color: #17a2b8;"
                                onmouseover="this.style.color='#1B4F72';"
                                onmouseout="this.style.color='#1B4F72';">
                                <i class="far fa-eye"></i> Ver
                            </a>
                            <a href="{{ route('users.edit', [$user->id]) }}"
                                class='btn btn-sm btn-outline-secondary'>
                               <i class="far fa-edit"></i> Editar
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $users])
        </div>
    </div>
</div>
