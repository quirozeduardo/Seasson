<?php

namespace App\Repositories\Admin;

use App\Models\Admin\OrderedArticle;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OrderedArticleRepository
 * @package App\Repositories\Admin
 * @version May 1, 2018, 12:30 am UTC
 *
 * @method OrderedArticle findWithoutFail($id, $columns = ['*'])
 * @method OrderedArticle find($id, $columns = ['*'])
 * @method OrderedArticle first($columns = ['*'])
*/
class OrderedArticleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'article_id',
        'quantity'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return OrderedArticle::class;
    }
}
