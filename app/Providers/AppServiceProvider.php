<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Admin;
use App\Models\Advice;
use App\Models\Content;
use App\Models\Link;
use App\Models\Post;
use App\Models\Statistic;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\Video;
use Illuminate\Support\ServiceProvider;
use View;
use App\Models\Category;
use App\Models\Capacity;
use App\Models\Product;
use App\Models\Brand;
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
        View::share('admins', Admin::all());
    }
}
