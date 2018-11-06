<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\InStockDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateInStockRequest;
use App\Http\Requests\Admin\UpdateInStockRequest;
use App\Models\Admin\Article;
use App\Models\Admin\Size;
use App\Repositories\Admin\InStockRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class InStockController extends AppBaseController
{
    /** @var  InStockRepository */
    private $inStockRepository;

    public function __construct(InStockRepository $inStockRepo)
    {
        $this->inStockRepository = $inStockRepo;
    }

    /**
     * Display a listing of the InStock.
     *
     * @param InStockDataTable $inStockDataTable
     * @return Response
     */
    public function index(InStockDataTable $inStockDataTable)
    {
        return $inStockDataTable->render('admin.in_stocks.index');
    }

    /**
     * Show the form for creating a new InStock.
     *
     * @return Response
     */
    public function create()
    {
        $articles= Article::get()->pluck('name', 'id');
        $sizes= Size::get()->pluck('size', 'id');
        return view('admin.in_stocks.create')
            ->with('articles',$articles)
            ->with('sizes',$sizes);
    }

    /**
     * Store a newly created InStock in storage.
     *
     * @param CreateInStockRequest $request
     *
     * @return Response
     */
    public function store(CreateInStockRequest $request)
    {
        $input = $request->all();

        $inStock = $this->inStockRepository->create($input);

        Flash::success('In Stock saved successfully.');

        return redirect(route('admin.inStocks.index'));
    }

    /**
     * Display the specified InStock.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $inStock = $this->inStockRepository->findWithoutFail($id);

        if (empty($inStock)) {
            Flash::error('In Stock not found');

            return redirect(route('admin.inStocks.index'));
        }

        return view('admin.in_stocks.show')->with('inStock', $inStock);
    }

    /**
     * Show the form for editing the specified InStock.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $inStock = $this->inStockRepository->findWithoutFail($id);

        if (empty($inStock)) {
            Flash::error('In Stock not found');

            return redirect(route('admin.inStocks.index'));
        }

        $articles= Article::get()->pluck('name', 'id');
        $sizes= Size::get()->pluck('size', 'id');
        return view('admin.in_stocks.edit')
            ->with('inStock', $inStock)
            ->with('articles',$articles)
            ->with('sizes',$sizes);
    }

    /**
     * Update the specified InStock in storage.
     *
     * @param  int              $id
     * @param UpdateInStockRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInStockRequest $request)
    {
        $inStock = $this->inStockRepository->findWithoutFail($id);

        if (empty($inStock)) {
            Flash::error('In Stock not found');

            return redirect(route('admin.inStocks.index'));
        }

        $inStock = $this->inStockRepository->update($request->all(), $id);

        Flash::success('In Stock updated successfully.');

        return redirect(route('admin.inStocks.index'));
    }

    /**
     * Remove the specified InStock from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $inStock = $this->inStockRepository->findWithoutFail($id);

        if (empty($inStock)) {
            Flash::error('In Stock not found');

            return redirect(route('admin.inStocks.index'));
        }

        $this->inStockRepository->delete($id);

        Flash::success('In Stock deleted successfully.');

        return redirect(route('admin.inStocks.index'));
    }
}
