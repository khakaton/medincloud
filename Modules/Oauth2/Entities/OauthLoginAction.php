<?php


namespace Modules\Oauth2\Entities;


use Illuminate\Database\Eloquent\Model;

class OauthLoginAction extends Model
{
    public $table = 'oauth_login_actions';

    protected $appends = ['data'];

    public $casts = [
        'data' => 'array',
        'unique_data' => 'array'
    ];

    protected $fillable = [
        'priority',
        'provider_client_id',
        'name',
        'method',
        'source',
        'model_class',
        'data',
        'unique_data',
        'status'
    ];

    public function setDataAttribute($value)
    {
        $this->attributes['data'] = json_encode($value);
    }

    public function provider_client()
    {
        return $this->belongsTo(OauthProviderClient::class, 'provider_client_id');
    }
}
