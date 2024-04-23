<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'Propietario:') !!}
    <p>
        <a href="../users/{{ $photo->user_id}}" class="btn btn-outline-dark">{{ $photo->user->name }}</a>
        con rol de 
        <a href="../rols/{{ $photo->user->role_id }}" class="btn btn-outline-dark">{{ $photo->user->role->name }}</a>
    </p>
</div>

<!-- Photo Details Id Field -->
<div class="col-sm-12">
    {!! Form::label('photo_details_id', 'Detalles de la foto: ') !!}
    <p>
        <a href="../photoDetails/{{ $photo->photo_details_id}}" class="btn btn-outline-dark">Ver detalles de la foto</a>
    </p>
</div>

<div class="col-sm-12">
    <h5>Descripción:</h5>
    <p>{{ $photo->photoDetails->description}}</p>
</div>

<!-- Url Field -->
<div class="col-sm-12">
    {!! Form::label('url', 'Url:') !!}
    <p>{{ $photo->url }}</p>
    <p><img src="{{asset($photo->url)}}" alt="" style="width: 20%"></p>
</div>
