<!-- Ubicación elementos para crear la foto -->

<!-- User Id Field -->
<div class="form-group col-sm-0">
    {!! Form::hidden('user_id', $photo->id?? Auth::user()->id, ['class'=>'form-control','required']) !!}   
</div>
<!-- Photo Details Id Field -->
<div class="form-group col-sm-6">
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
        <img src="{{ assent($photo->url) }}" alt="" style="width: 40%;">
    @else
    @endif

</div>

<!-- Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url', 'Seleccione imagen: ') !!}
    {!! Form::file('url_image', null, ['class' => 'form-control-file', 'accept' => '.jpg, .png']) !!}
</div>