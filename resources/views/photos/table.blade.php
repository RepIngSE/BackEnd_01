
<!-- Configuración general de la tabla de fotos -->

<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="photos-table">
        <thead class="thead" style="background-color: #17a2b8; color: #ffffff;">
            <tr>
                <th>Propietario</th>
                <th>Detalles</th>
                <th>Url</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($photos as $photo)
                <tr>
                    <td>
                        <a href="../users/{{ $photo->user_id}}" class="btn btn-outline-dark"
                        onmouseover="this.style.backgroundColor='#add8e6'; this.style.color='#000';"
                        onmouseout="this.style.backgroundColor=''; this.style.color='';">
                        {{ $photo->user->name }}</a>
                    </td>
                    <td>
                    <a href="../photoDetails/{{ $photo->photo_details_id}}" class="btn btn-outline-dark"
                        onmouseover="this.style.backgroundColor='#add8e6'; this.style.color='#000';"
                        onmouseout="this.style.backgroundColor=''; this.style.color='';">Ver detalles de la foto</a>
                    </td>
                    <td>
                        <img src="{{asset($photo->url)}}" alt="" style="width: 20%">
                    </td>
                    <td  style="width: 200px">
                        {!! Form::open(['route' => ['photos.destroy', $photo->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('photos.show', [$photo->id]) }}"
                                class='btn btn-sm btn-outline-info'
                                style="color: #17a2b8;"
                                onmouseover="this.style.color='#1B4F72';"
                                onmouseout="this.style.color='#1B4F72';">
                                    <i class="far fa-eye"></i> Ver
                            </a>
                            <a href="{{ route('photos.edit', [$photo->id]) }}"
                                class='btn btn-sm btn-outline-secondary'>
                               <i class="far fa-edit"></i> Editar
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-sm btn-outline-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
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
            @include('adminlte-templates::common.paginate', ['records' => $photos])
        </div>
    </div>
</div>
