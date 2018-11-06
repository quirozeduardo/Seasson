<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class OrderStatus
 * @package App\Models\Admin
 * @version May 1, 2018, 12:26 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection Order
 * @property string status
 */
class OrderStatus extends Model
{

    public $table = 'order_status';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'status' => 'string'
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
    public function orders()
    {
        return $this->hasMany(\App\Models\Admin\Order::class);
    }
}
