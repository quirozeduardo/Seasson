<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\SizesArticleDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateSizesArticleRequest;
use App\Http\Requests\Admin\UpdateSizesArticleRequest;
use App\Repositories\Admin\SizesArticleRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SizesArticleController extends AppBaseController
{
    /** @var  SizesArticleRepository */
    private $sizesArticleRepository;

    public function __construct(SizesArticleRepository $sizesArticleRepo)
    {
        $this->sizesArticleRepository = $sizesArticleRepo;
    }

    /**
     * Display a listing of the SizesArticle.
     *
     * @param SizesArticleDataTable $sizesArticleDataTable
     * @return Response
     */
    public function index(SizesArticleDataTable $sizesArticleDataTable)
    {
        return $sizesArticleDataTable->render('admin.sizes_articles.index');
    }

    /**
     * Show the form for creating a new SizesArticle.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.sizes_articles.create');
    }

    /**
     * Store a newly created SizesArticle in storage.
     *
     * @param CreateSizesArticleRequest $request
     *
     * @return Response
     */
    public function store(CreateSizesArticleRequest $request)
    {
        $input = $request->all();

        $sizesArticle = $this->sizesArticleRepository->create($input);

        Flash::success('Sizes Article saved successfully.');

        return redirect(route('admin.sizesArticles.index'));
    }

    /**
     * Display the specified SizesArticle.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sizesArticle = $this->sizesArticleRepository->findWithoutFail($id);

        if (empty($sizesArticle)) {
            Flash::error('Sizes Article not found');

            return redirect(route('admin.sizesArticles.index'));
        }

        return view('admin.sizes_articles.show')->with('sizesArticle', $sizesArticle);
    }

    /**
     * Show the form for editing the specified SizesArticle.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sizesArticle = $this->sizesArticleRepository->findWithoutFail($id);

        if (empty($sizesArticle)) {
            Flash::error('Sizes Article not found');

            return redirect(route('admin.sizesArticles.index'));
        }

        return view('admin.sizes_articles.edit')->with('sizesArticle', $sizesArticle);
    }

    /**
     * Update the specified SizesArticle in storage.
     *
     * @param  int              $id
     * @param UpdateSizesArticleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSizesArticleRequest $request)
    {
        $sizesArticle = $this->sizesArticleRepository->findWithoutFail($id);

        if (empty($sizesArticle)) {
            Flash::error('Sizes Article not found');

            return redirect(route('admin.sizesArticles.index'));
        }

        $sizesArticle = $this->sizesArticleRepository->update($request->all(), $id);

        Flash::success('Sizes Article updated successfully.');

        return redirect(route('admin.sizesArticles.index'));
    }

    /**
     * Remove the specified SizesArticle from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sizesArticle = $this->sizesArticleRepository->findWithoutFail($id);

        if (empty($sizesArticle)) {
            Flash::error('Sizes Article not found');

            return redirect(route('admin.sizesArticles.index'));
        }

        $this->sizesArticleRepository->delete($id);

        Flash::success('Sizes Article deleted successfully.');

        return redirect(route('admin.sizesArticles.index'));
    }
}
