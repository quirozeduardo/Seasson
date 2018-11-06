<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class SizesArticle
 * @package App\Models\Admin
 * @version May 14, 2018, 4:06 am UTC
 *
 * @property \App\Models\Admin\Article article
 * @property \App\Models\Admin\Size size
 * @property integer article_id
 * @property integer size_id
 */
class SizesArticle extends Model
{

    public $table = 'sizes_article';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'article_id',
        'size_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'article_id' => 'integer',
        'size_id' => 'integer'
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
