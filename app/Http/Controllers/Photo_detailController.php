<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePhoto_detailRequest;
use App\Http\Requests\UpdatePhoto_detailRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Photo_detailRepository;
use Illuminate\Http\Request;
use Flash;

class Photo_detailController extends AppBaseController
{
    /** @var Photo_detailRepository $photoDetailRepository*/
    private $photoDetailRepository;

    public function __construct(Photo_detailRepository $photoDetailRepo)
    {
        $this->photoDetailRepository = $photoDetailRepo;
    }

    /**
     * Display a listing of the Photo_detail.
     */
    public function index(Request $request)
    {
        $photoDetails = $this->photoDetailRepository->paginate(10);

        return view('photo_details.index')
            ->with('photoDetails', $photoDetails);
    }

    /**
     * Show the form for creating a new Photo_detail.
     */
    public function create()
    {
        return view('photo_details.create');
    }

    /**
     * Store a newly created Photo_detail in storage.
     */
    public function store(CreatePhoto_detailRequest $request)
    {
        $input = $request->all();

        $photoDetail = $this->photoDetailRepository->create($input);

        Flash::success('Photo Detail saved successfully.');

        return redirect(route('photoDetails.index'));
    }

    /**
     * Display the specified Photo_detail.
     */
    public function show($id)
    {
        $photoDetail = $this->photoDetailRepository->find($id);

        if (empty($photoDetail)) {
            Flash::error('Photo Detail not found');

            return redirect(route('photoDetails.index'));
        }

        return view('photo_details.show')->with('photoDetail', $photoDetail);
    }

    /**
     * Show the form for editing the specified Photo_detail.
     */
    public function edit($id)
    {
        $photoDetail = $this->photoDetailRepository->find($id);

        if (empty($photoDetail)) {
            Flash::error('Photo Detail not found');

            return redirect(route('photoDetails.index'));
        }

        return view('photo_details.edit')->with('photoDetail', $photoDetail);
    }

    /**
     * Update the specified Photo_detail in storage.
     */
    public function update($id, UpdatePhoto_detailRequest $request)
    {
        $photoDetail = $this->photoDetailRepository->find($id);

        if (empty($photoDetail)) {
            Flash::error('Photo Detail not found');

            return redirect(route('photoDetails.index'));
        }

        $photoDetail = $this->photoDetailRepository->update($request->all(), $id);

        Flash::success('Photo Detail updated successfully.');

        return redirect(route('photoDetails.index'));
    }

    /**
     * Remove the specified Photo_detail from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $photoDetail = $this->photoDetailRepository->find($id);

        if (empty($photoDetail)) {
            Flash::error('Photo Detail not found');

            return redirect(route('photoDetails.index'));
        }

        $this->photoDetailRepository->delete($id);

        Flash::success('Photo Detail deleted successfully.');

        return redirect(route('photoDetails.index'));
    }
}
