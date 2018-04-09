<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
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
        //fix this all you have to do is edit your
        /**
         * Syntax error or access violation: 1071 Specified key was t
        oo long; max key length is 1000 bytes (SQL: alter table `users` add unique
        `users_email_unique`(`email`))
         */

        Schema::defaultStringLength(191);

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
