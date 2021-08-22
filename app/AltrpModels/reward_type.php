<?php

namespace App\AltrpModels;

use Illuminate\Database\Eloquent\Model as Model;
use App\Altrp\Generators\Traits\UserColumnsTrait;
use App\Traits\RelationshipsTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

// CUSTOM_NAMESPACES_BEGIN - IMPORTANT: Don't remove this comment! Write your namespaces between these comments.

// CUSTOM_NAMESPACES_END - IMPORTANT: Don't remove this comment! Write your namespaces between these comments.

class reward_type extends Model
{
    // CUSTOM_TRAITS_BEGIN - IMPORTANT: Don't remove this comment! Write your traits between these comments.
    
    // CUSTOM_TRAITS_END - IMPORTANT: Don't remove this comment! Write your traits between these comments.
    use UserColumnsTrait, RelationshipsTrait;
    use SoftDeletes;
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const CREATED_AT = 'created_at';

    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'updated_at';

    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'reward_types';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','description','scores','media_id'];

    /**
     * Relations that should be always with.
     *
     * @var array
     */
    protected $altrp_with = ['media_altrp'];

    // CUSTOM_PROPERTIES_BEGIN - IMPORTANT: Don't remove this comment! Write your properties between these comments.
    
    // CUSTOM_PROPERTIES_END - IMPORTANT: Don't remove this comment! Write your properties between these comments.

    // ACCESSORS - IMPORTANT: Don't remove this comment!
    
    // ACCESSORS - IMPORTANT: Don't remove this comment!

    // RELATIONSHIPS
    public function media_altrp()
    {
        return $this->belongsTo('App\AltrpModels\media_altrp', 'media_id', 'id');
    }

    public function reward()
    {
        return $this->hasMany('App\AltrpModels\reward', 'reward_types_id', 'id');
    }

    
    // RELATIONSHIPS

    // CUSTOM_METHODS_BEGIN - IMPORTANT: Don't remove this comment! Write your methods between these comments.
    
    // CUSTOM_METHODS_END - IMPORTANT: Don't remove this comment! Write your methods between these comments.
}
