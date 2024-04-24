<!-- Configuración para ver lo que esta dentro  de la foto -->

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'Propietario:') !!}
    <p>
        <a href="../users/{{ $photo->user_id}}" class="btn btn-outline-dark"
            onmouseover="this.style.backgroundColor='#add8e6'; this.style.color='#000';"
            onmouseout="this.style.backgroundColor=''; this.style.color='';">
            {{ $photo->user->name }}</a>
        con rol de 
        <a href="../rols/{{ $photo->user->role_id }}" class="btn btn-outline-dark"
            onmouseover="this.style.backgroundColor='#add8e6'; this.style.color='#000';"
            onmouseout="this.style.backgroundColor=''; this.style.color='';">
            {{ $photo->user->role->name }}</a>
    </p>
</div>

<!-- Photo Details Id Field -->
<div class="col-sm-12">
    {!! Form::label('photo_details_id', 'Detalles de la foto: ') !!}
    <p>
        <a href="../photoDetails/{{ $photo->photo_details_id}}" class="btn btn-outline-dark"
            onmouseover="this.style.backgroundColor='#add8e6'; this.style.color='#000';"
            onmouseout="this.style.backgroundColor=''; this.style.color='';">
            Ver detalles de la foto</a>
    </p>
</div>

<div class="col-sm-12">
    <h5>Descripción:</h5>
    <p>{{ $photo->photoDetails->description}}</p>
</div>

<!-- Url Field -->
<div class="col-sm-12">
    {!! Form::label('url', 'Url:') !!}
    <p><img src="{{asset($photo->url)}}" alt="" style="width: 25%"></p>
</div>
