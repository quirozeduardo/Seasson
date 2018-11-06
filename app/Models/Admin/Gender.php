<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class Gender
 * @package App\Models\Admin
 * @version May 1, 2018, 12:30 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection InStock
 * @property string name
 */
class Gender extends Model
{

    public $table = 'gender';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function inStocks()
    {
        return $this->hasMany(\App\Models\Admin\InStock::class);
    }
}
