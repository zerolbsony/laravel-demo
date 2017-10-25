<?php

namespace Nero\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //记录慢查询
        DB::listen(function ($query) {
            Log::warning('[query slow log]'.json_encode($query));
            if ($query->time > 500) {
                Log::warning('[query slow log]'.json_encode($query));
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
