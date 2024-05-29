<?php

namespace App\Providers;

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
        // $settings = Setting::first();
        // $services = Service::where('is_active' , 1 )->latest()->get();
        // $projects = Project::where('is_active' , 1 )->orderByRaw("RAND()")->take(4)->latest()->get();
        // $categories = Category::where('is_active' , 1 )->latest()->get();
        // $data = [
        //     'settings' => $settings , 
        //     'services' => $services , 
        //     'projects' => $projects , 
        //     'categories' => $categories , 
        // ];
        // View::share('data', $data);
    }
}
