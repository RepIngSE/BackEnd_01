<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="photos-table">
            <thead>
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
                        <a href="../users/{{ $photo->user_id}}" class="btn btn-outline-dark">{{ $photo->user->name }}</a>
                    </td>
                    <td>
                    <a href="../photoDetails/{{ $photo->photo_details_id}}" class="btn btn-outline-dark">Ver detalles de la foto</a>
                    </td>
                    <td>
                        <img src="{{asset($photo->url)}}" alt="" style="width: 20%">
                    </td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['photos.destroy', $photo->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('photos.show', [$photo->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('photos.edit', [$photo->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
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
            @include('adminlte-templates::common.paginate', ['records' => $photos])
        </div>
    </div>
</div>
