<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOauthProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oauth_providers', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('name')->unique();
            $table->string('redirect_uri');
            $table->string('status')->default('not installed');
            $table->string('provider_class');
            $table->timestamps();
        });

        $nowTime = \Carbon\Carbon::now();

        \Illuminate\Support\Facades\DB::table('oauth_providers')->insert([
            [
                'name' => 'google',
                'redirect_uri' => '/login/google/callback',
                'status' => 'not installed',
                'created_at' => $nowTime,
                'updated_at' => $nowTime,
                'provider_class' => 'SocialiteProviders\\Google\\GoogleExtendSocialite'
            ],
            [
                'name' => 'github',
                'redirect_uri' => '/login/github/callback',
                'status' => 'not installed',
                'created_at' => $nowTime,
                'updated_at' => $nowTime,
                'provider_class' => 'SocialiteProviders\\GitHub\\GitHubExtendSocialite'
            ],
            [
                'name' => 'laravelpassport',
                'redirect_uri' => '/login/laravelpassport/callback',
                'status' => 'not installed',
                'created_at' => $nowTime,
                'updated_at' => $nowTime,
                'provider_class' => 'SocialiteProviders\\LaravelPassport\\LaravelPassportExtendSocialite'
            ],
            [
                'name' => 'gitlab',
                'redirect_uri' => '/login/gitlab/callback',
                'status' => 'not installed',
                'created_at' => $nowTime,
                'updated_at' => $nowTime,
                'provider_class' => 'SocialiteProviders\\GitLab\\GitLabExtendSocialite'
            ],
            [
                'name' => 'twitter',
                'redirect_uri' => '/login/twitter/callback',
                'status' => 'not installed',
                'created_at' => $nowTime,
                'updated_at' => $nowTime,
                'provider_class' => 'SocialiteProviders\\Twitter\\TwitterExtendSocialite'
            ],
            [
                'name' => 'facebook',
                'redirect_uri' => '/login/facebook/callback',
                'status' => 'not installed',
                'created_at' => $nowTime,
                'updated_at' => $nowTime,
                'provider_class' => 'SocialiteProviders\\Facebook\\FacebookExtendSocialite'
            ],
            [
                'name' => 'linkedin',
                'redirect_uri' => '/login/linkedin/callback',
                'status' => 'not installed',
                'created_at' => $nowTime,
                'updated_at' => $nowTime,
                'provider_class' => 'SocialiteProviders\\LinkedIn\\LinkedInExtendSocialite'
            ],
            [
                'name' => 'instagram',
                'redirect_uri' => '/login/instagram/callback',
                'status' => 'not installed',
                'created_at' => $nowTime,
                'updated_at' => $nowTime,
                'provider_class' => 'SocialiteProviders\\Instagram\\InstagramExtendSocialite'
            ],
            [
                'name' => 'discord',
                'redirect_uri' => '/login/discord/callback',
                'status' => 'not installed',
                'created_at' => $nowTime,
                'updated_at' => $nowTime,
                'provider_class' => 'SocialiteProviders\\Discord\\DiscordExtendSocialite'
            ],
            [
                'name' => 'vkontakte',
                'redirect_uri' => '/login/vkontakte/callback',
                'status' => 'not installed',
                'created_at' => $nowTime,
                'updated_at' => $nowTime,
                'provider_class' => 'SocialiteProviders\\VKontakte\\VKontakteExtendSocialite'
            ],
            [
                'name' => 'yandex',
                'redirect_uri' => '/login/yandex/callback',
                'status' => 'not installed',
                'created_at' => $nowTime,
                'updated_at' => $nowTime,
                'provider_class' => 'SocialiteProviders\\Yandex\\YandexExtendSocialite'
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oauth_providers');
    }
}
