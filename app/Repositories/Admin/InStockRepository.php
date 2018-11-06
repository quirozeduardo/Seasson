<?php

namespace App\Repositories\Admin;

use App\Models\Admin\InStock;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class InStockRepository
 * @package App\Repositories\Admin
 * @version May 14, 2018, 12:35 am UTC
 *
 * @method InStock findWithoutFail($id, $columns = ['*'])
 * @method InStock find($id, $columns = ['*'])
 * @method InStock first($columns = ['*'])
*/
class InStockRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'article_id',
        'size_id',
        'quantity',
        'color'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return InStock::class;
    }
}
