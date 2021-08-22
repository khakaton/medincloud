<?php

namespace App\AltrpModels;

use Illuminate\Database\Eloquent\Model as Model;
use App\Altrp\Generators\Traits\UserColumnsTrait;
use App\Traits\RelationshipsTrait;

// CUSTOM_NAMESPACES_BEGIN - IMPORTANT: Don't remove this comment! Write your namespaces between these comments.

// CUSTOM_NAMESPACES_END - IMPORTANT: Don't remove this comment! Write your namespaces between these comments.

class bloger extends Model
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
    protected $table = 'blogers';

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
    protected $fillable = ['name','surname','patronymic','birthday','nickname','phone','email','media_id','confirmation','user_id','instagram_account','telegram_account','fio'];

    /**
     * Relations that should be always with.
     *
     * @var array
     */
    protected $altrp_with = ['media_altrp','user_altrp'];

    // CUSTOM_PROPERTIES_BEGIN - IMPORTANT: Don't remove this comment! Write your properties between these comments.
    
    // CUSTOM_PROPERTIES_END - IMPORTANT: Don't remove this comment! Write your properties between these comments.

    // ACCESSORS - IMPORTANT: Don't remove this comment!
    
    // ACCESSORS - IMPORTANT: Don't remove this comment!

    // RELATIONSHIPS
    public function reward()
    {
        return $this->hasMany('App\AltrpModels\reward', 'bloger_id', 'id');
    }

    public function report_bloger()
    {
        return $this->hasMany('App\AltrpModels\report_bloger', 'bloger_id', 'id');
    }

    public function media_altrp()
    {
        return $this->belongsTo('App\AltrpModels\media_altrp', 'media_id', 'id');
    }

    public function user_altrp()
    {
        return $this->belongsTo('App\AltrpModels\user_altrp', 'user_id', 'id');
    }

    
    // RELATIONSHIPS

    // CUSTOM_METHODS_BEGIN - IMPORTANT: Don't remove this comment! Write your methods between these comments.
    
    // CUSTOM_METHODS_END - IMPORTANT: Don't remove this comment! Write your methods between these comments.
}
