<?php


namespace Modules\Oauth2\Entities;


use App\User;
use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function provider()
    {
        return $this->belongsTo(OauthProvider::class);
    }
}
