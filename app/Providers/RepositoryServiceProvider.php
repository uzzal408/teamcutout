<?php

namespace App\Providers;

use App\Contracts\SliderContract;
use App\Repositories\SliderRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */

    protected $repositories = [
        SliderContract::class => SliderRepository::class,
    ];
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation){
            $this->app->bind($interface,$implementation);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
