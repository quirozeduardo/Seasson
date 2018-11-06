<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ArticleDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateArticleRequest;
use App\Http\Requests\Admin\UpdateArticleRequest;
use App\Models\Admin\Category;
use App\Models\Admin\Size;
use App\Models\Admin\SizesArticle;
use App\Repositories\Admin\ArticleRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Sujip\Guid\Guid;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Response;

class ArticleController extends AppBaseController
{
    /** @var  ArticleRepository */
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepo)
    {
        $this->articleRepository = $articleRepo;
    }

    /**
     * Display a listing of the Article.
     *
     * @param ArticleDataTable $articleDataTable
     * @return Response
     */
    public function index(ArticleDataTable $articleDataTable)
    {
        return $articleDataTable->render('admin.articles.index');
    }

    /**
     * Show the form for creating a new Article.
     *
     * @return Response
     */
    public function create()
    {
        $categories= Category::select(DB::Raw('CONCAT(category.name," - ",gender.name) as name'), 'category.id')
            ->join('gender','gender.id','category.gender_id')
            ->pluck('name', 'category.id');
        $sizes=Size::get()->pluck('size','id');
        return view('admin.articles.create')
            ->with('categories',$categories)
            ->with('sizes',$sizes);
    }

    /**
     * Store a newly created Article in storage.
     *
     * @param CreateArticleRequest $request
     *
     * @return Response
     */
    public function store(CreateArticleRequest $request)
    {
        $input = $request->all();        
        $guid=$this->guidDistinct();
        $nameImage = $this->storeImageOrUpdate($request->image,$guid);
        $input['image'] = $nameImage;
        $article = $this->articleRepository->create($input);
        //$article->image=$this->guidDistinct();
        //$article->save();
        $sizes=$request->input('sizes');
        $article_id=$article->id;
        foreach ($sizes as $size){
            $sizes_article=new SizesArticle;
            $sizes_article->article_id=$article_id;
            $sizes_article->size_id=$size;
            $sizes_article->save();
        }
        
        Flash::success('Article saved successfully.');

        return redirect(route('admin.articles.index'));
    }

    /**
     * Display the specified Article.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $article = $this->articleRepository->findWithoutFail($id);

        if (empty($article)) {
            Flash::error('Article not found');

            return redirect(route('admin.articles.index'));
        }

        return view('admin.articles.show')->with('article', $article);
    }

    /**
     * Show the form for editing the specified Article.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $article = $this->articleRepository->findWithoutFail($id);

        if (empty($article)) {
            Flash::error('Article not found');

            return redirect(route('admin.articles.index'));
        }
        $categories= Category::select(DB::Raw('CONCAT(category.name," - ",gender.name) as name'), 'category.id')
            ->join('gender','gender.id','category.gender_id')
            ->pluck('name', 'category.id');
        $sizes=Size::get()
            ->pluck('size','id');
        return view('admin.articles.edit')
            ->with('categories',$categories)
            ->with('sizes',$sizes)
            ->with('article', $article);
    }

    /**
     * Update the specified Article in storage.
     *
     * @param  int              $id
     * @param UpdateArticleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateArticleRequest $request)
    {
        $article = $this->articleRepository->findWithoutFail($id);

        if (empty($article)) {
            Flash::error('Article not found');

            return redirect(route('admin.articles.index'));
        }
        $input = $request->all();
        Storage::disk('images')->delete(''.$article->image);
        $guid=$this->guidDistinct();
        $nameImage = $this->storeImageOrUpdate($request->image,$guid);
        $input['image'] = $nameImage;
        $article = $this->articleRepository->update($input, $id);
        
        $sizes=$request->input('sizes');
        $article_id=$article->id;
        foreach ($sizes as $size){
            SizesArticle::updateOrCreate([
                'article_id'=>$article_id,
                'size_id'=>$size
            ]);
        }
        SizesArticle::where('article_id',$article_id)->whereNotIn('size_id',$sizes)->delete();

        Flash::success('Article updated successfully.');

        return redirect(route('admin.articles.index'));
    }

    /**
     * Remove the specified Article from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $article = $this->articleRepository->findWithoutFail($id);

        if (empty($article)) {
            Flash::error('Article not found');

            return redirect(route('admin.articles.index'));
        }
        Storage::disk('images')->delete(''.$article->image);
        $this->articleRepository->delete($id);

        Flash::success('Article deleted successfully.');

        return redirect(route('admin.articles.index'));
    }
    
    public function storeImageOrUpdate($image,$guid){
        $name = $guid.'.'.$image->getClientOriginalExtension();
        Storage::disk('images')->put($name, \File::get($image));
        return $name;
    }
    public function guidDistinct(){
        $guid = new Guid();
        return $guid->create();
    }
}
