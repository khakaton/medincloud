<?php


namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class AltrpRepositoryServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->bind(\App\Repositories\AltrpRepositories\Interfaces\testRepositoryInterface::class, \App\Repositories\AltrpRepositories\Eloquent\testRepository::class);


    }
}