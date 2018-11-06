<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class Size
 * @package App\Models\Admin
 * @version May 1, 2018, 12:30 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection InStock
 * @property string size
 */
class Size extends Model
{

    public $table = 'size';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'size'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'size' => 'string'
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
