<?php

namespace App\Providers;

use App\Models\Settings;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Config;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('settings',function ($app){
            return new Settings();
        });

        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Setting',Settings::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if(!\App::runningInConsole() && count(Schema::getColumnListing('settings'))){
            $settings = Settings::all();
            foreach ($settings as $key=>$setting){
                Config::set('settings.'.$setting->key,$setting->value);
            }

        }
    }
}
