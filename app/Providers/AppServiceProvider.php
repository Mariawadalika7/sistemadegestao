<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Vite;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->environment('local')) {
            URL::forceScheme('http');
            
            // Configuração para ambiente de desenvolvimento com servidor PHP integrado
            if (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 8000) {
                Vite::useHotFile(public_path('hot'));
                Vite::useBuildDirectory('build');
            }
        }
    }
}
