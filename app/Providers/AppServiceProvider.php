<?php

namespace App\Providers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use \App\Billing\Stripe;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend(
            'recaptcha',
            'App\\Validators\\ReCaptcha@validate'
        );
        view()->composer('posts.index', function ($view) {
            $view->with('archives', \App\Post::archives());
            Schema::defaultStringLength(191);
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Stripe::class, function () {
            return new Stripe(config('services.stripe.secret'));
        });
    }
}
