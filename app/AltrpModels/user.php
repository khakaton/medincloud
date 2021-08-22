<?php

namespace App\AltrpModels;

use Illuminate\Database\Eloquent\Model as Model;
use App\Altrp\Generators\Traits\UserColumnsTrait;
use App\Traits\RelationshipsTrait;

// CUSTOM_NAMESPACES_BEGIN - IMPORTANT: Don't remove this comment! Write your namespaces between these comments.

// CUSTOM_NAMESPACES_END - IMPORTANT: Don't remove this comment! Write your namespaces between these comments.

class user extends Model
{
    // CUSTOM_TRAITS_BEGIN - IMPORTANT: Don't remove this comment! Write your traits between these comments.
    
    // CUSTOM_TRAITS_END - IMPORTANT: Don't remove this comment! Write your traits between these comments.
    use UserColumnsTrait, RelationshipsTrait;
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;


    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'users';

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
    protected $fillable = [];

    /**
     * Relations that should be always with.
     *
     * @var array
     */
    protected $altrp_with = [];

    // CUSTOM_PROPERTIES_BEGIN - IMPORTANT: Don't remove this comment! Write your properties between these comments.
    
    // CUSTOM_PROPERTIES_END - IMPORTANT: Don't remove this comment! Write your properties between these comments.

    // ACCESSORS - IMPORTANT: Don't remove this comment!
    
    // ACCESSORS - IMPORTANT: Don't remove this comment!

    // RELATIONSHIPS
    
    // RELATIONSHIPS

    // CUSTOM_METHODS_BEGIN - IMPORTANT: Don't remove this comment! Write your methods between these comments.
    
    // CUSTOM_METHODS_END - IMPORTANT: Don't remove this comment! Write your methods between these comments.
}
