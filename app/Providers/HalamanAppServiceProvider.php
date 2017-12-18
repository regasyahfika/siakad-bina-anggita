<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;

class HalamanAppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $halaman = '';
        if (Request::segment(2)== 'home') {
            $halaman = 'home';
        }

        if (Request::segment(2)== 'kategori') {
            $halaman = 'kategori';
        }

        if (Request::segment(2)== 'post') {
            $halaman = 'post';
        }

        if (Request::segment(2)== 'tag') {
            $halaman = 'tag';
        }

        if (Request::segment(2)== 'user') {
            $halaman = 'user';
        }
        view()->share('halaman',$halaman);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
