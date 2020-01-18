<?php

namespace App\Providers;

use App\Cart;
use App\Categories;
use Illuminate\Support\Facades\Route;
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
        Route::bind('category', function ($value) {
            return Categories::where('id', $value)->first() ?? abort(404);
        });

        Route::bind('cartUpdate',function ($value){
            return Cart::where(['id'=>$value,'user_id'=>auth()->id()])->first() ?? abort(404);
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
