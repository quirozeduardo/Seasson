<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\OrderedArticleDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateOrderedArticleRequest;
use App\Http\Requests\Admin\UpdateOrderedArticleRequest;
use App\Repositories\Admin\OrderedArticleRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class OrderedArticleController extends AppBaseController
{
    /** @var  OrderedArticleRepository */
    private $orderedArticleRepository;

    public function __construct(OrderedArticleRepository $orderedArticleRepo)
    {
        $this->orderedArticleRepository = $orderedArticleRepo;
    }

    /**
     * Display a listing of the OrderedArticle.
     *
     * @param OrderedArticleDataTable $orderedArticleDataTable
     * @return Response
     */
    public function index(OrderedArticleDataTable $orderedArticleDataTable)
    {
        return $orderedArticleDataTable->render('admin.ordered_articles.index');
    }

    /**
     * Show the form for creating a new OrderedArticle.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.ordered_articles.create');
    }

    /**
     * Store a newly created OrderedArticle in storage.
     *
     * @param CreateOrderedArticleRequest $request
     *
     * @return Response
     */
    public function store(CreateOrderedArticleRequest $request)
    {
        $input = $request->all();

        $orderedArticle = $this->orderedArticleRepository->create($input);

        Flash::success('Ordered Article saved successfully.');

        return redirect(route('admin.orderedArticles.index'));
    }

    /**
     * Display the specified OrderedArticle.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $orderedArticle = $this->orderedArticleRepository->findWithoutFail($id);

        if (empty($orderedArticle)) {
            Flash::error('Ordered Article not found');

            return redirect(route('admin.orderedArticles.index'));
        }

        return view('admin.ordered_articles.show')->with('orderedArticle', $orderedArticle);
    }

    /**
     * Show the form for editing the specified OrderedArticle.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $orderedArticle = $this->orderedArticleRepository->findWithoutFail($id);

        if (empty($orderedArticle)) {
            Flash::error('Ordered Article not found');

            return redirect(route('admin.orderedArticles.index'));
        }

        return view('admin.ordered_articles.edit')->with('orderedArticle', $orderedArticle);
    }

    /**
     * Update the specified OrderedArticle in storage.
     *
     * @param  int              $id
     * @param UpdateOrderedArticleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrderedArticleRequest $request)
    {
        $orderedArticle = $this->orderedArticleRepository->findWithoutFail($id);

        if (empty($orderedArticle)) {
            Flash::error('Ordered Article not found');

            return redirect(route('admin.orderedArticles.index'));
        }

        $orderedArticle = $this->orderedArticleRepository->update($request->all(), $id);

        Flash::success('Ordered Article updated successfully.');

        return redirect(route('admin.orderedArticles.index'));
    }

    /**
     * Remove the specified OrderedArticle from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $orderedArticle = $this->orderedArticleRepository->findWithoutFail($id);

        if (empty($orderedArticle)) {
            Flash::error('Ordered Article not found');

            return redirect(route('admin.orderedArticles.index'));
        }

        $this->orderedArticleRepository->delete($id);

        Flash::success('Ordered Article deleted successfully.');

        return redirect(route('admin.orderedArticles.index'));
    }
}
