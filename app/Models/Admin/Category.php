<?php

namespace App\Models\Admin;

use Eloquent as Model;

/**
 * Class Category
 * @package App\Models\Admin
 * @version May 14, 2018, 12:30 am UTC
 *
 * @property \App\Models\Admin\Gender gender
 * @property \Illuminate\Database\Eloquent\Collection Article
 * @property \Illuminate\Database\Eloquent\Collection inStock
 * @property string name
 * @property string description
 * @property integer gender_id
 */
class Category extends Model
{

    public $table = 'category';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'name',
        'description',
        'gender_id'
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
        'gender_id' => 'integer'
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
    public function gender()
    {
        return $this->belongsTo(\App\Models\Admin\Gender::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function articles()
    {
        return $this->hasMany(\App\Models\Admin\Article::class);
    }
}
