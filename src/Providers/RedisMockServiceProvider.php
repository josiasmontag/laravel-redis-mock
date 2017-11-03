<?php
/**
 * Created by Josias Montag
 * Date: 03.11.17 20:01
 * Mail: josias@montag.info
 */

namespace Lunaweb\RedisMock\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Arr;
use Lunaweb\RedisMock\RedisManager;

class RedisMockServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton('redis',function ($app) {
            $config = $app->make('config')->get('database.redis');

            return new RedisManager(Arr::pull($config, 'client', 'predis'), $config);
        });

        $this->app->bind('redis.connection', function ($app) {
            return $app['redis']->connection();
        });
    }


    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['redis', 'redis.connection'];
    }

}
