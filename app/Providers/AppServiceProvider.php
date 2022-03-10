<?php

namespace App\Providers;

use App\Models\Ads;
use App\Models\Category;
use App\View\Components\Agency\LastNoticeComponent;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
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
        View::share('categories', Category::orderBy('name')->get());
        View::share('banners_two', Ads::where('initial_date','<=', date('Y-m-d'))->where('final_date','>',NOW())->whereLocalId(2)->inRandomOrder()->first());
        View::share('banners_one', Ads::where('initial_date','<=', date('Y-m-d'))->where('final_date','>',NOW())->whereLocalId(1)->inRandomOrder()->first());

        Blade::component('last-notice-component', LastNoticeComponent::class);
    }


}
