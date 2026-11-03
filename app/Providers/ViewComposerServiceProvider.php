<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view){
            $view->with('dashboard_composer', \App\Models\Dashboard::first());
          });

     view()->composer('*',function($view){
        $view->with('resources', \App\Models\Resource::where('published', 1)->orderBy('updated_at','desc')->paginate(6));
     });
      
        view()->composer('*',function($view){
        $view->with('resource', \App\Models\Resource::where('published', 1)->orderBy('updated_at','desc')->get());
     });

     view()->composer('*',function($view){
        $view->with('services', \App\Models\Service::where('published', 1)->get());
     });
      
     
       view()->composer('*',function($view){
      $view->with('partners', \App\Models\Partners::where('published', 1)->get());
   });
      view()->composer('*',function($view){
      $view->with('trainings', \App\Models\Training::where('published',1)->get());
     });
    
      
      view()->composer('*',function($view){
      $view->with('trainers', \App\Models\Trainer::where('published',1)->get());
     });
      
      
      
      view()->composer('*',function($view){
        $view->with('products', \App\Models\Products::where('published', 1)->get());
     });
    
     view()->composer('*', function($view){
        $view->with('faqs', \App\Models\FAQ::where('published', 1)->get());
     });

     view()->composer('*',function($view){
      $view->with('teams', \App\Models\Teams::where('published', 1)->get());
   });
   
    view()->composer('*',function($view){
      $view->with('leaders', \App\Models\Leader::where('published', 1)->take(2)->get());
   });

   view()->composer('*',function($view){
      $view->with('projects', \App\Models\Projects::where('published', 1)->get());
   });
   
    view()->composer('*',function($view){
      $view->with('careers', \App\Models\Career::where('published',1)->get());
     });
      
      view()->composer('*', function($view) {
    $view->with('download_categories', \App\Models\DownloadCategory::where('published', 1)->get());
});

     view()->composer('*',function($view){
      $view->with('downloads', \App\Models\Download::where('published',1)->get());
     });
   

     view()->composer('*',function($view){
      $view->with('about_composer', \App\Models\Page::where('published', 1)->first());
   });
    

   
   view()->composer('*', function ($view) {
      $view->with('clients', \App\Models\Client::where('published', 1)->get());
  });

  view()->composer('*', function ($view) {
   $view->with('customers', \App\Models\Customers::where('published', 1)->get());
});

    }
}
