<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQrcodeRequest;
use App\Http\Requests\UpdateQrcodeRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\QrcodeRepository;
use Illuminate\Http\Request;
use Flash;

class QrcodeController extends AppBaseController
{
    /** @var QrcodeRepository $qrcodeRepository*/
    private $qrcodeRepository;

    public function __construct(QrcodeRepository $qrcodeRepo)
    {
        $this->qrcodeRepository = $qrcodeRepo;
    }

    /**
     * Display a listing of the Qrcode.
     */
    public function index(Request $request)
    {
        $qrcodes = $this->qrcodeRepository->paginate(10);

        return view('qrcodes.index')
            ->with('qrcodes', $qrcodes);
    }

    /**
     * Show the form for creating a new Qrcode.
     */
    public function create()
    {
        return view('qrcodes.create');
    }

    /**
     * Store a newly created Qrcode in storage.
     */
    public function store(CreateQrcodeRequest $request)
    {
        $input = $request->all();

        $qrcode = $this->qrcodeRepository->create($input);

        //Guardar Código QR
        $file = 'generated_qrcodes/'.$qrcode->id.'.png';

        //Generar y descargar el QR
        $chs = "150x150";
        $cht = "qr";
        $chl = $qrcode->id;
        $choe = "UTF-8"; 
        $url = "https://qrcode.tec-it.com/API/QRCode?data={$chl}";
        if (file_put_contents($file, file_get_contents($url)))
        {
            echo "File dowloaded successfully"; 
        }
        else 
        {
            echo "File not dowloaded failed";
        }

        $this ->updateQrcodePath($qrcode->id, $file); 

        return redirect(route('qrcodes.show', ['qrcode' => $qrcode]));
    }

    /**
     * Display the specified Qrcode.
     */
    public function show($id)
    {
        $qrcode = $this->qrcodeRepository->find($id);

        if (empty($qrcode)) {
            Flash::error('Qrcode not found');

            return redirect(route('qrcodes.index'));
        }

        return view('qrcodes.show')->with('qrcode', $qrcode);
    }

    /**
     * Show the form for editing the specified Qrcode.
     */
    public function edit($id)
    {
        $qrcode = $this->qrcodeRepository->find($id);

        if (empty($qrcode)) {
            Flash::error('Qrcode not found');

            return redirect(route('qrcodes.index'));
        }

        return view('qrcodes.edit')->with('qrcode', $qrcode);
    }

    /**
     * Update the specified Qrcode in storage.
     */
    public function update($id, UpdateQrcodeRequest $request)
    {
        $qrcode = $this->qrcodeRepository->find($id);

        if (empty($qrcode)) {
            Flash::error('Qrcode not found');

            return redirect(route('qrcodes.index'));
        }

        $qrcode = $this->qrcodeRepository->update($request->all(), $id);

        Flash::success('Qrcode updated successfully.');

        return redirect(route('qrcodes.index'));
    }

    public function updateQrcodePath($id,$newQrcodePath)
    {
        $qrcode = $this->qrcodeRepository->find($id);

        if (empty($qrcode)) {
            Flash::error('Qrcode not found');

            return redirect(route('qrcodes.index'));
        }

        $qrcode -> update(['qrcode_path' => $newQrcodePath]); 
        Flash::success('Qrcode updated successfully.');
        return redirect(route('qrcodes.index'));
    }

    /**
     * Remove the specified Qrcode from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $qrcode = $this->qrcodeRepository->find($id);

        if (empty($qrcode)) {
            Flash::error('Qrcode not found');

            return redirect(route('qrcodes.index'));
        }

        $this->qrcodeRepository->delete($id);

        Flash::success('Qrcode deleted successfully.');

        return redirect(route('qrcodes.index'));
    }
}
