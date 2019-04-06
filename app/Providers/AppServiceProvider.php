<?php

namespace App\Providers;

use App\Models\HistoryRecord;
use App\Observers\HistoryRecordObserver;
use Illuminate\Support\Facades\Schema;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        HistoryRecord::observe(HistoryRecordObserver::class);
    }
}
