<?php

namespace App\Providers;

use App\Support\CompteurRequetes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
    $compteur = $this->app->make(CompteurRequetes::class);

    DB::listen(fn () => $compteur->incrementer());

    View::share('compteurSql', $compteur);
}
}
