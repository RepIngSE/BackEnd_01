<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Photo;
use App\Models\Qrcode;
use App\Http\Controllers\PhotoController;

class ApiController extends Controller
{

    public function photos(Request $request){
        if($request ->has('id')){
            $id = $request ->input('id');
            $fotos = Photo::where('id',$id)->get(); 
        }
        else {
            $fotos = Photo::all();
        }
        return response()->json($fotos);
    }

    public function uploadPhoto(Request $request)

    {
        $request->validate(['photo' => 'required|image|mimes:jpg,png|max:2048',
        'photo_details_id' => 'required|integer']);

        $photo = $request->file('photo');

        $photoDetailsId = $request->input('photo_details_id');

        // Generar un nombre único para el archivo
        $id_usuario = auth()->id();

        $fileName = "{$id_usuario}_" . time() . '.' . 
        $photo->getClientOriginalExtension();

        // Mover el archivo a la carpeta de destino

        $photo->move(public_path('select_images'), $fileName);

        // Guardar la ruta del archivo en la base de datos

        $photoModel = Photo::create([
            'user_id' => $id_usuario,
            'photo_details_id' => $photoDetailsId,
            'url' => 'select_images/' . $fileName, ]);

        return response()->json(['message' => 'Se actualizo la foto de manera exitosa', 
        'photo' => $photoModel],200);
    }
}
