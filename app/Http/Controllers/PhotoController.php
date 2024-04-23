<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\PhotoRepository;
use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Photo_detail;
use Flash;

class PhotoController extends AppBaseController
{
    /** @var PhotoRepository $photoRepository*/
    private $photoRepository;

    public function __construct(PhotoRepository $photoRepo)
    {
        $this->photoRepository = $photoRepo;
    }

    /**
     * Display a listing of the Photo.
     */
    public function index(Request $request)
    {
        $photos = $this->photoRepository->paginate(10);

        return view('photos.index')
            ->with('photos', $photos);
    }

    /**
     * Show the form for creating a new Photo.
     */
    public function create()
    {
        $photo = new Photo();
        $photodetail = Photo_detail::all();
        return view('photos.create', compact('photo', 'photodetail'));
    }

    /**
     * Store a newly created Photo in storage.
     */
    public function store(CreatePhotoRequest $request)
    {
        //Obtener todos los campos del formulario 
        $input = $request->all();

        //Obtener el archivo cargado desde el formulario 
        if ($request->hasFile('url_image')){
            $archivo = $request -> file ('url_image');

            //Generar nombre unico para el archivo
            $nameOriginal = $archivo -> getClientOriginalName();
            $extensionOriginal = $archivo -> getClientOriginalExtension();
            $id_usuario = auth() -> id();
            $fileName = "{$id_usuario}_{$nameOriginal}";

            //Mover el archivo a la carpeta destino 
            $archivo -> move(public_path('select_images'), $fileName);

            $input['url'] = 'select_images/' . $fileName;
        }

        //Crear la foto en la base de datos 
        $photo = $this->photoRepository->create($input);

        Flash::success('Foto guardada exitosamente.');

        return redirect(route('photos.index'));
    }

    /**
     * Display the specified Photo.
     */
    public function show($id)
    {
        $photo = $this->photoRepository->find($id);

        if (empty($photo)) {
            Flash::error('Photo not found');

            return redirect(route('photos.index'));
        }

        return view('photos.show')->with('photo', $photo);
    }

    /**
     * Show the form for editing the specified Photo.
     */
    public function edit($id)
    {
        $photo = $this->photoRepository->find($id);

        if (empty($photo)) {
            Flash::error('Photo not found');

            return redirect(route('photos.index'));
        }

        return view('photos.edit')->with('photo', $photo);
    }

    /**
     * Update the specified Photo in storage.
     */
    public function update($id, UpdatePhotoRequest $request)
    {
        $photo = $this->photoRepository->find($id);

        if (empty($photo)) {
            Flash::error('Photo not found');

            return redirect(route('photos.index'));
        }

        $photo = $this->photoRepository->update($request->all(), $id);

        Flash::success('Photo updated successfully.');

        return redirect(route('photos.index'));
    }

    /**
     * Remove the specified Photo from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $photo = $this->photoRepository->find($id);

        if (empty($photo)) {
            Flash::error('Photo not found');

            return redirect(route('photos.index'));
        }

        $this->photoRepository->delete($id);

        Flash::success('Photo deleted successfully.');

        return redirect(route('photos.index'));
    }
}
