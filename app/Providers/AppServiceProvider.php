<?php

namespace App\Providers;

use App\Models\Ads;
use App\Models\Category;
use App\Models\Company;
use App\Models\Social;
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
        View::share('companies', Company::whereStatus('1')->whereType('1')->orderBy('name')->get());
        View::share('prefectures', Company::whereStatus('1')->whereType('2')->orderBy('name')->get());
        View::share('services', Company::whereStatus('1')->whereType('3')->orderBy('name')->get());
        View::share('socials', Social::orderBy('name')->get());
        View::share('categories', Category::orderBy('name')->get());
        View::share('banners_two', Ads::where('initial_date','<=', date('Y-m-d'))->where('final_date','>',NOW())->whereLocalId(2)->inRandomOrder()->first());
        View::share('banners_one', Ads::where('initial_date','<=', date('Y-m-d'))->where('final_date','>',NOW())->whereLocalId(1)->inRandomOrder()->first());

        Blade::component('last-notice-component', LastNoticeComponent::class);
    }


}
