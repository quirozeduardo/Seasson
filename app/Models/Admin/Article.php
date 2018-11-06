<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class Article
 * @package App\Models\Admin
 * @version May 14, 2018, 4:05 am UTC
 *
 * @property \App\Models\Admin\Category category
 * @property \Illuminate\Database\Eloquent\Collection OrderedArticle
 * @property \Illuminate\Database\Eloquent\Collection sizesArticle
 * @property string name
 * @property string description
 * @property float price
 * @property float cost
 * @property string image
 * @property string info
 * @property integer category_id
 * @property integer quantity
 * @property float discount
 * @property string color
 */
class Article extends Model
{

    public $table = 'article';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'name',
        'description',
        'price',
        'cost',
        'image',
        'info',
        'category_id',
        'quantity',
        'discount',
        'color'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'price' => 'float',
        'cost' => 'float',
        'image' => 'string',
        'info' => 'string',
        'category_id' => 'integer',
        'quantity' => 'integer',
        'discount' => 'float',
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
    public function category()
    {
        return $this->belongsTo(\App\Models\Admin\Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orderedArticles()
    {
        return $this->hasMany(\App\Models\Admin\OrderedArticle::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function sizes()
    {
        return $this->belongsToMany(\App\Models\Admin\Size::class, 'sizes_article');
    }

}
