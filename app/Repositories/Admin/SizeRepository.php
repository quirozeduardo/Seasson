<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Size;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SizeRepository
 * @package App\Repositories\Admin
 * @version May 1, 2018, 12:30 am UTC
 *
 * @method Size findWithoutFail($id, $columns = ['*'])
 * @method Size find($id, $columns = ['*'])
 * @method Size first($columns = ['*'])
*/
class SizeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'size'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Size::class;
    }
}
