<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\FileEncryptionServiceInterface;
use App\Services\FileEncryptionService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FileEncryptionServiceInterface::class, FileEncryptionService::class);
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
