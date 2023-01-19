<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use View;
use App\Blood;
use App\Attend;
use App\Certm;
use App\Ereject;
use App\Exam1;
use App\Fund1;
use App\Grad;
use App\Gradc;
use App\Gradcert;
use App\Gradorder;
use App\hcert;
use App\Item;
use App\Lifen;
use App\Manual;
use App\Mark;
use App\Markn;
use App\Reject;
use App\Sregest;
use App\Stopreg;
use App\Termen;
use App\Unilife;

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
        view()->composer('*',function($view) {
            $view->with('bc', Blood::where('st','pendding')->count()); 
            $view->with('ac', Attend::where('st','pendding')->count()); 
            $view->with('cc', Certm::where('st','pendding')->count()); 
            $view->with('erc', Ereject::where('st','pendding')->count()); 
            $view->with('exc', Exam1::where('st','pendding')->count()); 
            $view->with('fc', Fund1::where('st','pendding')->count()); 
            $view->with('gc', Grad::where('st','pendding')->count()); 
            $view->with('grc', Gradc::where('st','pendding')->count()); 
            $view->with('grac', Gradcert::where('st','pendding')->count()); 
            $view->with('gradc', Gradorder::where('st','pendding')->count()); 
            $view->with('hc', hcert::where('st','pendding')->count()); 
            $view->with('ic', Item::where('st','pendding')->count()); 
            $view->with('lc', Lifen::where('st','pendding')->count()); 
            $view->with('mc', Manual::where('st','pendding')->count()); 
            $view->with('mac', Mark::where('st','pendding')->count()); 
            $view->with('marc', Markn::where('st','pendding')->count()); 
            $view->with('rec', Reject::where('st','pendding')->count()); 
            $view->with('src', Sregest::where('st','pendding')->count()); 
            $view->with('stc', Stopreg::where('st','pendding')->count()); 
            $view->with('tec', Termen::where('st','pendding')->count()); 
            $view->with('unc', Unilife::where('st','pendding')->count()); 
        });
        Schema::defaultStringLength(191);
    }
}
