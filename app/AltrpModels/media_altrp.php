<?php

namespace App\AltrpModels;

use App\Media as MediaModel;
use App\Altrp\Generators\Traits\UserColumnsTrait;
use App\Traits\RelationshipsTrait;

// CUSTOM_NAMESPACES_BEGIN - IMPORTANT: Don't remove this comment! Write your namespaces between these comments.

// CUSTOM_NAMESPACES_END - IMPORTANT: Don't remove this comment! Write your namespaces between these comments.

class media_altrp extends MediaModel
{
    // CUSTOM_TRAITS_BEGIN - IMPORTANT: Don't remove this comment! Write your traits between these comments.
    
    // CUSTOM_TRAITS_END - IMPORTANT: Don't remove this comment! Write your traits between these comments.
    use UserColumnsTrait, RelationshipsTrait;
    
    

    

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['author','guest_token','filename','media_type','url','type','caption','title','description','alternate_text','width','height'];

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
    public function reward_types()
    {
        return $this->hasMany('App\AltrpModels\reward_type', 'media_id', 'id');
    }

    public function bloger()
    {
        return $this->hasMany('App\AltrpModels\bloger', 'media_id', 'id');
    }

    public function event()
    {
        return $this->hasMany('App\AltrpModels\event', 'media_id', 'id');
    }

    
    // RELATIONSHIPS

    // CUSTOM_METHODS_BEGIN - IMPORTANT: Don't remove this comment! Write your methods between these comments.
    
    // CUSTOM_METHODS_END - IMPORTANT: Don't remove this comment! Write your methods between these comments.
}
