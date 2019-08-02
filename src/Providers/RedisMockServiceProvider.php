<?php
/**
 * Created by Josias Montag
 * Date: 03.11.17 20:01
 * Mail: josias@montag.info
 */

namespace Lunaweb\RedisMock\Providers;

use Illuminate\Support\ServiceProvider;
use Lunaweb\RedisMock\MockPredisConnector;

class RedisMockServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->make('redis')->extend('mock', function () {
            return new MockPredisConnector();
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }


}
