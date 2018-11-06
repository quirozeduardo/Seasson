<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\SizeDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateSizeRequest;
use App\Http\Requests\Admin\UpdateSizeRequest;
use App\Repositories\Admin\SizeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SizeController extends AppBaseController
{
    /** @var  SizeRepository */
    private $sizeRepository;

    public function __construct(SizeRepository $sizeRepo)
    {
        $this->sizeRepository = $sizeRepo;
    }

    /**
     * Display a listing of the Size.
     *
     * @param SizeDataTable $sizeDataTable
     * @return Response
     */
    public function index(SizeDataTable $sizeDataTable)
    {
        return $sizeDataTable->render('admin.sizes.index');
    }

    /**
     * Show the form for creating a new Size.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.sizes.create');
    }

    /**
     * Store a newly created Size in storage.
     *
     * @param CreateSizeRequest $request
     *
     * @return Response
     */
    public function store(CreateSizeRequest $request)
    {
        $input = $request->all();

        $size = $this->sizeRepository->create($input);

        Flash::success('Size saved successfully.');

        return redirect(route('admin.sizes.index'));
    }

    /**
     * Display the specified Size.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $size = $this->sizeRepository->findWithoutFail($id);

        if (empty($size)) {
            Flash::error('Size not found');

            return redirect(route('admin.sizes.index'));
        }

        return view('admin.sizes.show')->with('size', $size);
    }

    /**
     * Show the form for editing the specified Size.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $size = $this->sizeRepository->findWithoutFail($id);

        if (empty($size)) {
            Flash::error('Size not found');

            return redirect(route('admin.sizes.index'));
        }

        return view('admin.sizes.edit')->with('size', $size);
    }

    /**
     * Update the specified Size in storage.
     *
     * @param  int              $id
     * @param UpdateSizeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSizeRequest $request)
    {
        $size = $this->sizeRepository->findWithoutFail($id);

        if (empty($size)) {
            Flash::error('Size not found');

            return redirect(route('admin.sizes.index'));
        }

        $size = $this->sizeRepository->update($request->all(), $id);

        Flash::success('Size updated successfully.');

        return redirect(route('admin.sizes.index'));
    }

    /**
     * Remove the specified Size from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $size = $this->sizeRepository->findWithoutFail($id);

        if (empty($size)) {
            Flash::error('Size not found');

            return redirect(route('admin.sizes.index'));
        }

        $this->sizeRepository->delete($id);

        Flash::success('Size deleted successfully.');

        return redirect(route('admin.sizes.index'));
    }
}
