<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Gender;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class GenderRepository
 * @package App\Repositories\Admin
 * @version May 1, 2018, 12:30 am UTC
 *
 * @method Gender findWithoutFail($id, $columns = ['*'])
 * @method Gender find($id, $columns = ['*'])
 * @method Gender first($columns = ['*'])
*/
class GenderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Gender::class;
    }
}
