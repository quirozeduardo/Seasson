<?php

namespace App\Repositories\Admin;

use App\Models\Admin\OrderStatus;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OrderStatusRepository
 * @package App\Repositories\Admin
 * @version May 1, 2018, 12:26 am UTC
 *
 * @method OrderStatus findWithoutFail($id, $columns = ['*'])
 * @method OrderStatus find($id, $columns = ['*'])
 * @method OrderStatus first($columns = ['*'])
*/
class OrderStatusRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return OrderStatus::class;
    }
}
