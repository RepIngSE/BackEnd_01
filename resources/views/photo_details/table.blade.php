
<!-- Configuración general de la tabla de detalles -->

<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-bordered table-hover" id="photo_details-table">
        <thead class="thead" style="background-color: #17a2b8; color: #ffffff;">

                <tr>
                    <th>Ubicación Gps</th>
                    <th>Estado</th>
                    <th>Descripción</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($photoDetails as $photoDetail)
                <tr>
                    <td>{{ $photoDetail->gps_location }}</td>
                    <td>{{ $photoDetail->status }}</td>
                    <td>{{ $photoDetail->description }}</td>
                    <td style="width: 200px">
                        {!! Form::open(['route' => ['photoDetails.destroy', $photoDetail->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                        <a href="{{ route('photoDetails.show', [$photoDetail->id]) }}"
                        class='btn btn-sm btn-outline-info'
                            style="color: #17a2b8;"
                            onmouseover="this.style.color='#1B4F72';"
                            onmouseout="this.style.color='#1B4F72';">
                                <i class="far fa-eye"></i> Ver
                        </a>
                            <a href="{{ route('photoDetails.edit', [$photoDetail->id]) }}"
                               class='btn btn-sm btn-outline-secondary'>
                               <i class="far fa-edit"></i> Editar
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-sm btn-outline-danger', 'onclick' => "return confirm('¿Estás seguro?')"]) !!}
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
            @include('adminlte-templates::common.paginate', ['records' => $photoDetails])
        </div>
    </div>
</div>

