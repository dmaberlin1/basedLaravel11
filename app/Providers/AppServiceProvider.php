<?php

namespace App\Providers;

use App\View\Composers\UserComposer;
use Illuminate\Support\Facades\Route;
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
        Route::pattern('slug','[a-z0-9-]+');
        View::share('random_joke',$this->getRandomJoke());
        \view()->share('random_joke',$this->getRandomJoke());
        View::composer(['user.*'],UserComposer::class);
        View::composer(['layouts.incs.navbar'],function (\Illuminate\View\View $view){
            $view->with('users_count',150);
        });
    }

    public function getRandomJoke()
    {
        $url='https://official-joke-api.appspot.com/random_joke';
        $data=json_decode(file_get_contents($url));
        return $data->setup.' - '.$data->punchline;
    }
}
