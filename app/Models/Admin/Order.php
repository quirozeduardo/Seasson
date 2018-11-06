<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class Order
 * @package App\Models\Admin
 * @version May 1, 2018, 12:24 am UTC
 *
 * @property \App\Models\Admin\OrderStatus orderStatus
 * @property \App\Models\Admin\OrderedArticle orderedArticle
 * @property \App\Models\Admin\User user
 * @property integer ordered_article_id
 * @property integer user_id
 * @property boolean paid
 * @property integer status_id
 */
class Order extends Model
{

    public $table = 'order';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'ordered_article_id',
        'user_id',
        'paid',
        'status_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ordered_article_id' => 'integer',
        'user_id' => 'integer',
        'paid' => 'boolean',
        'status_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function orderStatus()
    {
        return $this->belongsTo(\App\Models\Admin\OrderStatus::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function orderedArticle()
    {
        return $this->belongsTo(\App\Models\Admin\OrderedArticle::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\Admin\User::class);
    }
}
