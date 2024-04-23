<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'Id propietario:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Photo Details Id Field -->
<div class="form-group col-sm-6">
    {!! Form::hidden('user_id', $photo->id?? Auth::user()->id, ['class'=>'form-control','required']) !!}   
    {!! Form::label('photo_details_id', 'Id de los detalles de la foto:') !!}

    <?php
    $photoDetailsOptions = []; 
    foreach ($photodetail as  $photo_detail){
        $photoDetailsOptions[$photo_detail->id] = $photo_detail->description;
    }
    ?>

    {!! Form::select('photo_details_id', $photoDetailsOptions, null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Url Field -->
<div class="form-group col-sm-6">
    {!! Form::hidden('url', $photo->url ?? 'indefinido', ['class' => 'form-control', 'maxlength' => 255]) !!}
    @if ($photo->url)
        <img src="{{ assent($photo->url) }}" alt="" style="width: 20%;">
    @else
        <p>No se ha cargado ninguna imagen</p>
    @endif

</div>

<!-- Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url', 'Seleccione imagen: ') !!}
    {!! Form::file('url_image', null, ['class' => 'form-control-file', 'accept' => '.jpg, .png']) !!}
</div>