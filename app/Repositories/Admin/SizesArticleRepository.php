<?php

namespace App\Repositories\Admin;

use App\Models\Admin\SizesArticle;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SizesArticleRepository
 * @package App\Repositories\Admin
 * @version May 14, 2018, 4:06 am UTC
 *
 * @method SizesArticle findWithoutFail($id, $columns = ['*'])
 * @method SizesArticle find($id, $columns = ['*'])
 * @method SizesArticle first($columns = ['*'])
*/
class SizesArticleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'article_id',
        'size_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SizesArticle::class;
    }
}
