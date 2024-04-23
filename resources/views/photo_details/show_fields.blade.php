<!-- Gps Location Field 
<div class="col-sm-12">
    @if ($photoDetail->photos->isNotEmpty())
        <h5>Propietario:</h5>
        <ul>
            @foreach($photoDetail->photos as $photo)
            <li>
                <p>
                    <a href="../users/{{ $photo->user_id}}" class="btn btn-outline-dark">{{ $photo->user->name }}</a>
                    con rol de 
                    <a href="../rols/{{ $photo->user->role_id }}" class="btn btn-outline-dark">{{ $photo->user->role->name }}</a>
                </p>
            </li>
            @endforeach
        </ul>
    @endif
</div>  -->

<div class="col-sm-12">
    {!! Form::label('gps_location', 'Ubicación Gps:') !!}
    <p>{{ $photoDetail->gps_location }}</p>

    <?php
    $coordinates = explode(',', $photoDetail->gps_location);
    $lon= $coordinates[0]; // Primer valor después de dividir
    $lat = $coordinates[1]; // Segundo valor después de dividir
 
    ?>

<div style="overflow:hidden;max-width:100%;width:500px;height:500px;">
        <div id="google-maps-canvas" style="height:100%; width:100%;max-width:100%;">
            <iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q={{ $lon }},+{{ $lat }}&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
        </div>
    </div>
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Estado:') !!}
    <p>{{ $photoDetail->status }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Descripción:') !!}
    <p>{{ $photoDetail->description }}</p>
</div>

<div class="col-sm-12">
    @if ($photoDetail->photos->isNotEmpty())
        <h4>Fotos con la misma descripción:</h4>
        <ul>
            @foreach($photoDetail->photos as $photo)
                <li><a href="{{ route('photos.show', $photo->id) }}">{{ $photo->url }}</a>
                <p><img src="{{asset($photo->url)}}" alt="" style="width: 20%"></p></li>
            @endforeach
        </ul>
    @else
        <p>No hay fotos con la misma descripción </p>
    @endif
</div>
