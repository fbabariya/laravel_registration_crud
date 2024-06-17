<?php

namespace App\Providers;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\RouteBinding;
use App\Models\crud;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\apiCrudController;


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
        // Route::bind('crud',function($value){
        //     return crud::where('id',$value)->with('getcountry')->get()??abort(400);
        // });
        Paginator::useBootstrap();
     }
    }