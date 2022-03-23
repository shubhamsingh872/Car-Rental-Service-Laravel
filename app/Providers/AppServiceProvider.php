<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if(file_exists(storage_path('installed'))){
            if (Schema::hasTable('general_setting')) {
                $siteInfo = DB::table('general_setting')->first();
            }
            if (Schema::hasTable('social_settings')) {
                $social = DB::table('social_settings')->get();
            }

            view()->share(['siteInfo'=> $siteInfo,'social'=>$social]);
        } 
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
