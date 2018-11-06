<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\GenderDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateGenderRequest;
use App\Http\Requests\Admin\UpdateGenderRequest;
use App\Repositories\Admin\GenderRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class GenderController extends AppBaseController
{
    /** @var  GenderRepository */
    private $genderRepository;

    public function __construct(GenderRepository $genderRepo)
    {
        $this->genderRepository = $genderRepo;
    }

    /**
     * Display a listing of the Gender.
     *
     * @param GenderDataTable $genderDataTable
     * @return Response
     */
    public function index(GenderDataTable $genderDataTable)
    {
        return $genderDataTable->render('admin.genders.index');
    }

    /**
     * Show the form for creating a new Gender.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.genders.create');
    }

    /**
     * Store a newly created Gender in storage.
     *
     * @param CreateGenderRequest $request
     *
     * @return Response
     */
    public function store(CreateGenderRequest $request)
    {
        $input = $request->all();

        $gender = $this->genderRepository->create($input);

        Flash::success('Gender saved successfully.');

        return redirect(route('admin.genders.index'));
    }

    /**
     * Display the specified Gender.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $gender = $this->genderRepository->findWithoutFail($id);

        if (empty($gender)) {
            Flash::error('Gender not found');

            return redirect(route('admin.genders.index'));
        }

        return view('admin.genders.show')->with('gender', $gender);
    }

    /**
     * Show the form for editing the specified Gender.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $gender = $this->genderRepository->findWithoutFail($id);

        if (empty($gender)) {
            Flash::error('Gender not found');

            return redirect(route('admin.genders.index'));
        }

        return view('admin.genders.edit')->with('gender', $gender);
    }

    /**
     * Update the specified Gender in storage.
     *
     * @param  int              $id
     * @param UpdateGenderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGenderRequest $request)
    {
        $gender = $this->genderRepository->findWithoutFail($id);

        if (empty($gender)) {
            Flash::error('Gender not found');

            return redirect(route('admin.genders.index'));
        }

        $gender = $this->genderRepository->update($request->all(), $id);

        Flash::success('Gender updated successfully.');

        return redirect(route('admin.genders.index'));
    }

    /**
     * Remove the specified Gender from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $gender = $this->genderRepository->findWithoutFail($id);

        if (empty($gender)) {
            Flash::error('Gender not found');

            return redirect(route('admin.genders.index'));
        }

        $this->genderRepository->delete($id);

        Flash::success('Gender deleted successfully.');

        return redirect(route('admin.genders.index'));
    }
}
