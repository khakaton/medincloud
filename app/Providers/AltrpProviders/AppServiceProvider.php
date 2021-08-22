<?php


namespace App\Providers\AltrpProviders;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \App\AltrpModels\user_altrp::observe(\App\Observers\AltrpObservers\user_altrpObserver::class);

        \App\AltrpModels\media_altrp::observe(\App\Observers\AltrpObservers\media_altrpObserver::class);

        \App\AltrpModels\reward_type::observe(\App\Observers\AltrpObservers\reward_typeObserver::class);

        \App\AltrpModels\reward::observe(\App\Observers\AltrpObservers\rewardObserver::class);

        \App\AltrpModels\report_bloger::observe(\App\Observers\AltrpObservers\report_blogerObserver::class);

        \App\AltrpModels\platform::observe(\App\Observers\AltrpObservers\platformObserver::class);

        \App\AltrpModels\partner::observe(\App\Observers\AltrpObservers\partnerObserver::class);

        \App\AltrpModels\event::observe(\App\Observers\AltrpObservers\eventObserver::class);

        \App\AltrpModels\bloger::observe(\App\Observers\AltrpObservers\blogerObserver::class);

        \App\AltrpModels\parser_bloggers::observe(\App\Observers\AltrpObservers\parser_bloggersObserver::class);


    }
}