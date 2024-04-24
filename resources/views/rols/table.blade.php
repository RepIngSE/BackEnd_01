<!-- Configuración general de la tabla roles -->

<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="rols-table">
        <thead class="thead" style="background-color: #17a2b8; color: #ffffff;">
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th colspan="3">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($rols as $rol)
                <tr>
                    <td>{{ $rol->id }}</td>
                    <td>{{strtoupper( $rol->name )}}</td>
                    <td  style="width: 200px">
                        {!! Form::open(['route' => ['rols.destroy', $rol->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('rols.show', [$rol->id]) }}"
                                class='btn btn-sm btn-outline-info'
                                style="color: #17a2b8;"
                                onmouseover="this.style.color='#1B4F72';"
                                onmouseout="this.style.color='#1B4F72';">
                                    <i class="far fa-eye"></i> Ver
                            </a>
                            <a href="{{ route('rols.edit', [$rol->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $rols])
        </div>
    </div>
</div>
