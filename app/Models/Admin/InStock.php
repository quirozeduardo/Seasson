<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class InStock
 * @package App\Models\Admin
 * @version May 14, 2018, 12:35 am UTC
 *
 * @property \App\Models\Admin\Article article
 * @property \App\Models\Admin\Size size
 * @property integer article_id
 * @property integer size_id
 * @property integer quantity
 * @property string color
 */
class InStock extends Model
{

    public $table = 'in_stock';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'article_id',
        'size_id',
        'quantity',
        'color'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'article_id' => 'integer',
        'size_id' => 'integer',
        'quantity' => 'integer',
        'color' => 'string'
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
    public function article()
    {
        return $this->belongsTo(\App\Models\Admin\Article::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function size()
    {
        return $this->belongsTo(\App\Models\Admin\Size::class);
    }
}
