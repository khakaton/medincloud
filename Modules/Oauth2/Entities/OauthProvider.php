<?php


namespace Modules\Oauth2\Entities;


use Illuminate\Database\Eloquent\Model;

class OauthProvider extends Model
{
    protected $fillable = [
        'name',
        'redirect_uri',
        'status',
        'provider_class'
    ];

    public function clients()
    {
        return $this->hasMany(OauthProviderClient::class, 'provider_id');
    }
}
