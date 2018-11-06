<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class OrderedArticle
 * @package App\Models\Admin
 * @version May 1, 2018, 12:30 am UTC
 *
 * @property \App\Models\Admin\Article article
 * @property \Illuminate\Database\Eloquent\Collection Order
 * @property integer article_id
 * @property integer quantity
 */
class OrderedArticle extends Model
{

    public $table = 'ordered_article';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'article_id',
        'quantity'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'article_id' => 'integer',
        'quantity' => 'integer'
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orders()
    {
        return $this->hasMany(\App\Models\Admin\Order::class);
    }
}
